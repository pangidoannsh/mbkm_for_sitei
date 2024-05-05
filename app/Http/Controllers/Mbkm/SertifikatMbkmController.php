<?php

namespace App\Http\Controllers\Mbkm;

use App\Http\Controllers\Controller;
use App\Models\Mbkm\Konversi;
use App\Models\Mbkm\MataKuliah;
use App\Models\Mbkm\SertifikatMbkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SertifikatMbkmController extends Controller
{
    public function create($id)
    {
        $matkul = MataKuliah::all();
        $mahasiswa = Auth::guard("mahasiswa")->user();
        $konversi = Konversi::where("mbkm_id", $id)->get();
        $sertifikat = SertifikatMbkm::where("mbkm_id", $id)->first();
        $mbkmId = $id;
        return view('mbkm.sertifikat.create', compact('konversi', 'mbkmId', 'sertifikat', 'matkul'));
    }

    public function store(Request $request)
    {
        $files =  time() . '.' . $request->file->extension();
        Storage::putFileAs('public/sertifikat', $request->file('file'), $files);
        $mahasiswa = Auth::guard("mahasiswa")->user();
        $sertifikat = SertifikatMbkm::create([
            'mahasiswa_nim' => $mahasiswa->nim,
            'mbkm_id' => $request->mbkm_id,
            'file' => "sertifikat/" . $files

        ]);

        return redirect()->route('mbkm');
    }

    public function storekonversi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mbkm_id' => 'required',
            'matkul' => 'required',
            'nama_nilai_mbkm' => 'required',
            'nilai_mbkm' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $matkul = MataKuliah::findOrFail($request->matkul);

        Konversi::create([
            'mbkm_id' => $request->mbkm_id,
            'nama_nilai_mbkm' => $request->nama_nilai_mbkm,
            'nama_nilai_matkul' => $matkul->mk,
            'kode_matkul' => $matkul->kode_mk,
            'sks' => $matkul->sks,
            'jenis_matkul' => $matkul->jenis,
            'nilai_mbkm' => $request->nilai_mbkm,
        ]);

        return back();
    }

    public function destroykonversi($id)
    {
        $konversi = Konversi::findOrFail($id);
        $konversi->delete();

        return back();
    }
}
