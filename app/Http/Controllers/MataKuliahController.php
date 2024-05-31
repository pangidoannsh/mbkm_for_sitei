<?php

namespace App\Http\Controllers;

use App\Models\Mbkm\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard("web")->user();
        $model = MataKuliah::where("prodi_id", $user->role_id - 1)->get();
        return view("mbkm.matkul.index", compact("model"));
    }
    public function create()
    {
        return view("mbkm.matkul.create");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required',
            'mk' => 'required',
            'sks' => 'required',
            'jenis' => 'required'
        ]);

        MataKuliah::create([
            "kode_mk" => $request->kode_mk,
            "mk" => $request->mk,
            "sks" => $request->sks,
            "prodi_id" => Auth::guard("web")->user()->role_id - 1,
            'jenis' => $request->jenis
        ]);
        Alert::success('Berhasil!', 'Berhasil membuat Mata kuliah baru')->showConfirmButton('Ok', '#28a745');
        return redirect()->route("matkul");
    }
    public function edit($id)
    {
        $model = MataKuliah::findOrFail($id);
        return view("mbkm.matkul.edit", compact('model'));
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
        $request->validate([
            'kode_mk' => 'required',
            'mk' => 'required',
            'sks' => 'required',
            'jenis' => 'required'
        ]);
        MataKuliah::findOrFail($id)->update([
            "kode_mk" => $request->kode_mk,
            "mk" => $request->mk,
            "sks" => $request->sks,
            'jenis' => $request->jenis
        ]);
        Alert::success('Berhasil!', 'Berhasil megubah Mata kuliah')->showConfirmButton('Ok', '#28a745');
        return redirect()->route("matkul");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MataKuliah::findOrFail($id)->delete();
        Alert::success('Berhasil!', 'Berhasil menghapus Mata kuliah')->showConfirmButton('Ok', '#28a745');
        return redirect()->route("matkul");
    }
}
