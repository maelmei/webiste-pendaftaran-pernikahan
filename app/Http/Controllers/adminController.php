<?php

namespace App\Http\Controllers;

use App\Exports\akadExport;
use App\Exports\istriExport;
use App\Models\User;
use App\Models\penghulu;
use App\Models\daftarakad;
use App\Exports\suamiExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class adminController extends Controller
{
    //

    public function admin(Request $request)
    {
        $akad = daftarakad::all()->count();
        $penghulu = penghulu::all()->count();
        $user = User::where('level', 'user')->count();
        return view('admin.admin', compact('akad', 'user', 'penghulu'));
    }

    public function datasuami()
    {
        $suami = daftarakad::with('uset')->get();
   
        return view('data_suami.suami', compact('suami'));
    }

    public function hapus_suami(Request $request, $id, $user_id)
    {
        $hapus_suami = daftarakad::find($id);
        $hapus_suami->delete();

        $user = User::where('id', $user_id)->update([
            'cek_id' => '0'
        ]);
        
        return back()->with('success', 'Berhasil Terhapus');
    }

    public function edit_suami(Request $request, $id)
    {

        $suami = daftarakad::whereId($id)->first();
   
        return view('data_suami.edit_suami', compact('suami'));
    }

    public function proses_update_suami(Request $request, $id)
    {
        if($request->foto_suami){
            $foto_suami = time().'.'.$request->foto_suami->extension();
            $request->foto_suami->move(public_path('foto_suami'), $foto_suami);
            $suami = daftarakad::whereId($id)->update([
                'nama_calon_suami' => $request->nama_calon_suami,
                'no_ktp_suami' => $request->no_ktp_suami,
                'tempat_lahir_suami' => $request->tempat_lahir_suami,
                'tanggal_lahir_suami' => $request->tanggal_lahir_suami,
                'alamat_suami' => $request->alamat_suami,
                'pekerjaan_suami' => $request->pekerjaan_suami,
                'status_suami' => $request->status_suami,
                'foto_suami' => $foto_suami
            ]);
        }else {
            $suami = daftarakad::whereId($id)->update([
                'nama_calon_suami' => $request->nama_calon_suami,
                'no_ktp_suami' => $request->no_ktp_suami,
                'tempat_lahir_suami' => $request->tempat_lahir_suami,
                'tanggal_lahir_suami' => $request->tanggal_lahir_suami,
                'alamat_suami' => $request->alamat_suami,
                'pekerjaan_suami' => $request->pekerjaan_suami,
                'status_suami' => $request->status_suami,
           
            ]);
        }
        return redirect('datasuami')->with('success', 'Berhasil Di Update');
    }

    public function exportSuami()
    {
     
            return Excel::download(new suamiExport, 'calonSuami.xlsx');
    }

    public function dataistri()
    {
        $istri = daftarakad::all();
   
        return view('istri.istri', ['istri' => $istri]);
    }

    public function edit_istri(Request $request, $id)

    {
        $istri = daftarakad::whereId($id)->first();

        return view('istri.edit_istri', compact('istri'));
    }

    public function proses_update_istri(Request $request, $id)
    {

        if($request->foto_istri){
            $foto_istri = time().'.'.$request->foto_istri->extension();
            $request->foto_istri->move(public_path('foto_istri'), $foto_istri);
            $istri = daftarakad::whereId($id)->update([
                'nama_calon_istri' => $request->nama_calon_istri,
                'no_ktp_istri' => $request->no_ktp_istri,
                'tempat_lahir_istri' => $request->tempat_lahir_istri,
                'tanggal_lahir_istri' => $request->tanggal_lahir_istri,
                'alamat_istri' => $request->alamat_istri,
                'pekerjaan_istri' => $request->pekerjaan_istri,
                'status_istri' => $request->status_istri,
                'foto_istri' => $foto_istri
            ]);
        }else {
            $istri = daftarakad::whereId($id)->update([
                'nama_calon_istri' => $request->nama_calon_istri,
                'no_ktp_istri' => $request->no_ktp_istri,
                'tempat_lahir_istri' => $request->tempat_lahir_istri,
                'tanggal_lahir_istri' => $request->tanggal_lahir_istri,
                'alamat_istri' => $request->alamat_istri,
                'pekerjaan_istri' => $request->pekerjaan_istri,
                'status_istri' => $request->status_istri,
           
            ]);
        }
        return redirect('dataistri')->with('success', 'Berhasil Di Update');
    }
    
    public function hapus_istri(Request $request, $id, $user_id)
    {
        $istri = daftarakad::find($id);
        $istri->delete();

        $user = User::whereId($user_id)->update([
            'cek_id' => '0'
        ]);

        return back()->with('success', 'Berhasil Dihapus');
    }

    public function exportIstri()
    {
        $istri = Excel::download(new istriExport,'istri.xlsx');
        return $istri;
    }

    public function penghulu()
    {
        $penghulu2 = penghulu::all();
        return view('penghulu.penghulu', compact('penghulu2'));
    }

    public function akad_admin()
    {
        $akad = daftarakad::all();
        return view('data_akad_admin.akad_admin', ['akad' => $akad]);
    }

    public function akadExport()
    {
        return Excel::download(new akadExport, 'akad.xlsx');
    }
}
