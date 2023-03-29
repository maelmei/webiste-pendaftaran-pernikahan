<?php

namespace App\Http\Controllers;

use App\Models\penghulu;
use Illuminate\Foundation\Bus\PendingClosureDispatch;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\penghuluExport;
use App\Imports\penghuluImport;
use Maatwebsite\Excel\Facades\Excel;

class penghuluController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('penghulu.tambah-penghulu');
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
        $validate = $request->validate([
            'nama_penghulu' => 'required',
            'gol_jabatan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required'
        ]);

        Penghulu::create([
            'nama_penghulu' => $request->nama_penghulu,
            'gol_jabatan' => $request->gol_jabatan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'id' => Str::uuid()

        ]);
        return redirect('penghulu')->with('success', 'Berhasil');


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
        $penghulu = Penghulu::where('id', $id)->first();

        return view('penghulu.edit-penghulu', compact('penghulu'));
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
        $validate = $request->validate([
            'nama_penghulu' => 'required',
            'gol_jabatan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required'
        ]);

        penghulu::where('id', $id)->update($validate);

        return redirect('penghulu')->with('success', 'Berhasil');
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
        $penghulu = penghulu::find($id);
        $penghulu->delete();
        return redirect('penghulu')->with('success', 'Berhasil Di Hapus');
    }

    public function exportPenghulu()
    {
        return Excel::download(new penghuluExport, 'penghulu.xlsx');
    }

    public function importPenghulu(Request $request)
    {
        Excel::import(new penghuluImport, $request->penghuluImport);
        return back()->with('success', 'Berhasil Import');
    }
}
