<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\User;
use App\Models\penghulu;
use App\Models\daftarakad;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class akadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $penghulu = penghulu::all();
        return view('akad.daftarakad', compact('penghulu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function syaratakad()
    {
        return view('akad.syaratAkad');
    }

    public function akad(Request $request)
    {
     
   
        $validate =$request->validate([
            'nama_calon_suami' => 'required',
            'no_ktp_suami' => 'required',
            'tempat_lahir_suami' => 'required',
            'tanggal_lahir_suami' => 'required',
            'alamat_suami' => 'required',
            'pekerjaan_suami' => 'required',
            'status_suami' => 'required',
            'foto_suami' => 'required|mimes:jpg,jpeg,png',     
            'nama_calon_istri' => 'required',
            'no_ktp_istri' => 'required',
            'tempat_lahir_istri' => 'required',
            'tanggal_lahir_istri' => 'required',
            'alamat_istri' => 'required',
            'pekerjaan_istri' => 'required',
            'status_istri' => 'required',
            'foto_istri' => 'required',
            'nama_penghulu' => 'required',
           'tanggal_akad_nikah' => 'required',
            'waktu_akad_nikah' => 'required',
            'mahar_pernikahan' => 'required',
            'tempat_akad' => 'required'

            
        ]);

        $file_name_istri = time().'.'.$request->foto_istri->extension(); 
        $request->foto_istri->move(public_path('foto_istri'), $file_name_istri);

        $file_name_suami = time().'.'.$request->foto_suami->extension(); 
        $request->foto_suami->move(public_path('foto_suami'), $file_name_suami);

        daftarakad::create([
            'id' => Str::uuid(),
            'nama_calon_suami' => $request->nama_calon_suami,
            'no_ktp_suami' => $request->no_ktp_suami,
            'tempat_lahir_suami' => $request->tempat_lahir_suami,
            'tanggal_lahir_suami' => $request->tanggal_lahir_suami,
            'alamat_suami' => $request->alamat_suami,
            'pekerjaan_suami' => $request->pekerjaan_suami,
            'status_suami' => $request->status_suami,
            'foto_suami' => $file_name_suami,     
            'nama_calon_istri' => $request->nama_calon_istri,
            'no_ktp_istri' => $request->no_ktp_istri,
            'tempat_lahir_istri' => $request->tempat_lahir_istri,
            'tanggal_lahir_istri' => $request->tanggal_lahir_istri,
            'alamat_istri' => $request->alamat_istri,
            'pekerjaan_istri' => $request->pekerjaan_istri,
            'status_istri' => $request->status_istri,
            'foto_istri' => $file_name_istri,
            'nama_penghulu' => $request->nama_penghulu,
           'tanggal_akad_nikah' => $request->tanggal_akad_nikah,
            'waktu_akad_nikah' => $request->waktu_akad_nikah,
            'mahar_pernikahan' => $request->mahar_pernikahan,
            'tempat_akad' => $request->tempat_akad,
            'status' => 'Belum Terverifikasi',
            'user_id' => $request->user_id
        ]);
        
        $user = User::whereId($request->cek_id)->update([
            'cek_id' => 'Belum Terverifikasi'
        ]);

        return redirect('daftarAkad')->with('success', 'data berhasil di simpan');
    }

    public function akunuser($id)
    {
        $user = User::whereId($id)->first();
        return view('akunuser', ['user' => $user]);
    }

    public function prosesakunuser(Request $request, $id)
    {
        $validate = $request->validate([
            'username' => 'required',
            'nama_lengkap' => 'required'
        ]);
    if($request->password){    
    if(Hash::check($request->password_lama, auth()->user()->password)){
        if($request->password == $request->password2){
            User::whereId($id)->update([
                'username' => $request->username,
                'nama_lengkap' => $request->nama_lengkap,
                'password' => Hash::make($request->password)
            ]);
            return back()->with('success', 'Berhasil Di Ubah');
        } else {
            return back()->with('status', 'Password Konfirmasi Tidak Sama');
        }
    } else {
        return back()->with('status', 'Password Lama Tidak Sama!!');
    }
}

        User::whereId($id)->update([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
        ]);
        return back()->with('success', 'Berhasil Di Ubah');
       
    }
    
public function hapusakad($id, $user_id)
{
    $akad = daftarakad::find($id);
    $akad->delete();
    $user = User::where('id', $user_id)->update([
        'cek_id' => '0'
    ]);
    return back()->with('success', 'Berhasil Di Hapus');
}
    public function editakaduser($id)
    {
        $user = daftarakad::with('penghulu')->whereId($id)->first();

        return view('data_akad_admin.edit_akad_admin', ['user' => $user]);
    }

    public function proses_edit_akad(Request $request)
    {
        if($request->comment){
            $user = $request->validate([
                'comment' => 'required'
            ]);
          User::whereId($request->user_id)->update([
            'cek_id' => 'Kurang Item',
            'comment' => $request->comment
          ]);

          daftarakad::where('user_id', $request->user_id)->update([
            'status' => 'Kurang Item',
          ]);

          return back()->with('success', 'Berhasil');
        }

        return back()->with('warning', 'Comment Belum Terisi');
    }

    public function updateakaduser($id, $user_id)
    {
        // daftarakad::where('id', $id)->update([
        //     'status' => 'Sudah Terverifikasi',
        // ]);
        $user = daftarakad::findOrFail($id);
        $user->status = 'Sudah Terverifikasi';
        $user->save();

        User::where('id', $user_id)->update([
            'cek_id' => 'Sudah Terverifikasi'
        ]);

        
        return back()->with('success', 'Berhasil');
    }

    public function user_edit(Request $request, $id)
    {
        $user = daftarakad::where('user_id', $id)->first();
        return view('akad.user_edit', ['user' => $user]);
    }

    public function proses_edit_users(Request $request, $id)
    {
       
        if($request->foto_istri && $request->foto_suami){
            $file_name_suami = time().'.'.$request->foto_suami->extension(); 
            $suami = $request->foto_suami->move(public_path('foto_suami'), $file_name_suami);
            $file_name_istri = time().'.'.$request->foto_istri->extension(); 
            $istri = $request->foto_istri->move(public_path('foto_istri'), $file_name_istri);
            $user = daftarakad::where('id', $id)->update([
                'nama_calon_suami' => $request->nama_calon_suami,
                'no_ktp_suami' => $request->no_ktp_suami,
                'tempat_lahir_suami' => $request->tempat_lahir_suami,
                'tanggal_lahir_suami' => $request->tanggal_lahir_suami,
                'alamat_suami' => $request->alamat_suami,
                'pekerjaan_suami' => $request->pekerjaan_suami,
                'status_suami' => $request->status_suami,    
                'nama_calon_istri' => $request->nama_calon_istri,
                'no_ktp_istri' => $request->no_ktp_istri,
                'tempat_lahir_istri' => $request->tempat_lahir_istri,
                'tanggal_lahir_istri' => $request->tanggal_lahir_istri,
                'alamat_istri' => $request->alamat_istri,
                'pekerjaan_istri' => $request->pekerjaan_istri,
                'status_istri' => $request->status_istri,
                'foto_istri' => $file_name_istri,
                'foto_suami' => $file_name_suami,
    
                'tanggal_akad_nikah' => $request->tanggal_akad_nikah,
                'waktu_akad_nikah' => $request->waktu_akad_nikah,
                'mahar_pernikahan' => $request->mahar_pernikahan,
                'tempat_akad' => $request->tempat_akad,
                'status' => 'Update'
            ]);
            return redirect('dashboard-user')->with('success', 'Berhasil');
        }elseif($request->foto_suami){
            
        $file_name_suami = time().'.'.$request->foto_suami->extension(); 
        $request->foto_suami->move(public_path('foto_suami'), $file_name_suami);
        $user = daftarakad::where('id', $id)->update([ 

            'nama_calon_suami' => $request->nama_calon_suami,
            'no_ktp_suami' => $request->no_ktp_suami,
            'tempat_lahir_suami' => $request->tempat_lahir_suami,
            'tanggal_lahir_suami' => $request->tanggal_lahir_suami,
            'alamat_suami' => $request->alamat_suami,
            'pekerjaan_suami' => $request->pekerjaan_suami,
            'status_suami' => $request->status_suami,
            'foto_suami' => $file_name_suami,     
            'nama_calon_istri' => $request->nama_calon_istri,
            'no_ktp_istri' => $request->no_ktp_istri,
            'tempat_lahir_istri' => $request->tempat_lahir_istri,
            'tanggal_lahir_istri' => $request->tanggal_lahir_istri,
            'alamat_istri' => $request->alamat_istri,
            'pekerjaan_istri' => $request->pekerjaan_istri,
            'status_istri' => $request->status_istri,

           'tanggal_akad_nikah' => $request->tanggal_akad_nikah,
            'waktu_akad_nikah' => $request->waktu_akad_nikah,
            'mahar_pernikahan' => $request->mahar_pernikahan,
            'tempat_akad' => $request->tempat_akad,
            'status' => 'Update'
        ]);
        return redirect('dashboard-user')->with('success', 'Berhasil');}
        // }elseif($request->foto_suami && $request->foto_istri ) {
        //     $file_name_istri = time().'.'.$request->foto_istri->extension(); 
        //     $request->foto_istri->move(public_path('foto_istri'), $file_name_istri);

        //     $file_name_suami = time().'.'.$request->foto_suami->extension(); 
        //     $request->foto_suami->move(public_path('foto_suami'), $file_name_suami);

        //     $user = daftarakad::where('id', $id)->update([
        //         'nama_calon_suami' => $request->nama_calon_suami,
        //         'no_ktp_suami' => $request->no_ktp_suami,
        //         'tempat_lahir_suami' => $request->tempat_lahir_suami,
        //         'tanggal_lahir_suami' => $request->tanggal_lahir_suami,
        //         'alamat_suami' => $request->alamat_suami,
        //         'pekerjaan_suami' => $request->pekerjaan_suami,
        //         'status_suami' => $request->status_suami,
        //         'foto_suami' => $file_name_suami,     
        //         'nama_calon_istri' => $request->nama_calon_istri,
        //         'no_ktp_istri' => $request->no_ktp_istri,
        //         'tempat_lahir_istri' => $request->tempat_lahir_istri,
        //         'tanggal_lahir_istri' => $request->tanggal_lahir_istri,
        //         'alamat_istri' => $request->alamat_istri,
        //         'pekerjaan_istri' => $request->pekerjaan_istri,
        //         'status_istri' => $request->status_istri,
        //         'foto_istri' => $file_name_istri,
    
        //        'tanggal_akad_nikah' => $request->tanggal_akad_nikah,
        //         'waktu_akad_nikah' => $request->waktu_akad_nikah,
        //         'mahar_pernikahan' => $request->mahar_pernikahan,
        //         'tempat_akad' => $request->tempat_akad,
        //         'status' => 'Update'
        //     ]);  
        //     return redirect('dashboard-user')->with('success', 'Berhasil');
        // }
        elseif($request->foto_istri) {
            $file_name_istri = time().'.'.$request->foto_istri->extension(); 
                $request->foto_istri->move(public_path('foto_istri'), $file_name_istri);
            $user = daftarakad::where('id', $id)->update([
                'nama_calon_suami' => $request->nama_calon_suami,
                'no_ktp_suami' => $request->no_ktp_suami,
                'tempat_lahir_suami' => $request->tempat_lahir_suami,
                'tanggal_lahir_suami' => $request->tanggal_lahir_suami,
                'alamat_suami' => $request->alamat_suami,
                'pekerjaan_suami' => $request->pekerjaan_suami,
                'status_suami' => $request->status_suami,  
                'nama_calon_istri' => $request->nama_calon_istri,
                'no_ktp_istri' => $request->no_ktp_istri,
                'tempat_lahir_istri' => $request->tempat_lahir_istri,
                'tanggal_lahir_istri' => $request->tanggal_lahir_istri,
                'alamat_istri' => $request->alamat_istri,
                'pekerjaan_istri' => $request->pekerjaan_istri,
                'status_istri' => $request->status_istri,
                'foto_istri' => $file_name_istri,
    
                'tanggal_akad_nikah' => $request->tanggal_akad_nikah,
                'waktu_akad_nikah' => $request->waktu_akad_nikah,
                'mahar_pernikahan' => $request->mahar_pernikahan,
                'tempat_akad' => $request->tempat_akad,
                'status' => 'Update'

            ]);
           
            return redirect('dashboard-user')->with('success', 'Berhasil');
        }

        else{
            $user = daftarakad::where('id', $id)->update([
                'nama_calon_suami' => $request->nama_calon_suami,
                'no_ktp_suami' => $request->no_ktp_suami,
                'tempat_lahir_suami' => $request->tempat_lahir_suami,
                'tanggal_lahir_suami' => $request->tanggal_lahir_suami,
                'alamat_suami' => $request->alamat_suami,
                'pekerjaan_suami' => $request->pekerjaan_suami,
                'status_suami' => $request->status_suami,  
                'nama_calon_istri' => $request->nama_calon_istri,
                'no_ktp_istri' => $request->no_ktp_istri,
                'tempat_lahir_istri' => $request->tempat_lahir_istri,
                'tanggal_lahir_istri' => $request->tanggal_lahir_istri,
                'alamat_istri' => $request->alamat_istri,
                'pekerjaan_istri' => $request->pekerjaan_istri,
                'status_istri' => $request->status_istri,
             
    
                'tanggal_akad_nikah' => $request->tanggal_akad_nikah,
                'waktu_akad_nikah' => $request->waktu_akad_nikah,
                'mahar_pernikahan' => $request->mahar_pernikahan,
                'tempat_akad' => $request->tempat_akad,
                'status' => 'Update'
            ]);
            
            return redirect('dashboard-user')->with('success', 'Berhasil');
        }
    }

    public function report()
    {
    
        return view('report');
    }

    public function reportuser($id)
    {
        $user = daftarakad::where('user_id', $id)->first();
        $data = [];

        // Membuat view dengan data yang telah diambil
        $view = View::make('report', $data, compact('user'));

        // Membuat objek DomPDF
        $pdf = new Dompdf();

        // Memuat view ke dalam objek DomPDF
        $pdf->loadHtml($view->render());
        

        // Mengatur ukuran dan orientasi kertas
        $pdf->setPaper('A4', 'portrait');

        // Rendering PDF
        $pdf->render();

        // Memberikan nama file dan header pada output PDF
        return $pdf->stream('document.pdf');
    }
    
}
