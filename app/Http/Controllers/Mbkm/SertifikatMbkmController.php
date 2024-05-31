<?php

namespace App\Http\Controllers\Mbkm;

use App\Http\Controllers\Controller;
use App\Models\Mbkm\Konversi;
use App\Models\Mbkm\Logbook;
use App\Models\Mbkm\MataKuliah;
use App\Models\Mbkm\Mbkm;
use App\Models\Mbkm\PenilaianMbkm;
use App\Models\Mbkm\SertifikatMbkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SertifikatMbkmController extends Controller
{
    public function create($id)
    {
        // Cek ada tidaknya data mbkm
        $mbkm = Mbkm::findOrFail($id);

        // Cek logbook telah lengkap
        $logbooks = Logbook::where("mbkm_id", $id)->get();
        $hasEmptyFileField = $logbooks->contains(function ($logbook) {
            return is_null($logbook->file);
        });
        if ($hasEmptyFileField) {
            Alert::error('Gagal!', 'Logbook anda belum lengkap')->showConfirmButton('Ok', '#F27474');
            return redirect()->back();
        }


        $mahasiswa = Auth::guard("mahasiswa")->user();
        $matkul = MataKuliah::where("prodi_id", $mahasiswa->prodi_id)->get();
        $konversi = Konversi::where("mbkm_id", $id)->get();
        $sertifikat = SertifikatMbkm::where("mbkm_id", $id)->first();
        $penilaianMbkm = PenilaianMbkm::where("mbkm_id", $id)->get();
        return view('mbkm.sertifikat.create', compact('konversi', 'mbkm', 'sertifikat', 'matkul', 'penilaianMbkm'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $mahasiswa = Auth::guard("mahasiswa")->user();

        // Store Sertifikat
        if ($request->hasFile('file')) {
            $files =  time() . '.' . $request->file->extension();
            Storage::putFileAs('public/sertifikat', $request->file('file'), $files);
            $currentSertifikat = SertifikatMbkm::where("mbkm_id", $request->mbkm_id)->first();
            if ($currentSertifikat) {
                Storage::delete("public/" . $currentSertifikat->file);
                $currentSertifikat->file = "sertifikat/" . $files;
                $currentSertifikat->update();
            } else {
                SertifikatMbkm::create([
                    'mahasiswa_nim' => $mahasiswa->nim,
                    'mbkm_id' => $request->mbkm_id,
                    'file' => "sertifikat/" . $files
                ]);
            }
        }
        // Store Matkul yang akan dikonversi
        $konversi = $request->konversi;
        if (is_array($konversi)) {
            foreach ($konversi as $mk_id) {
                $matkul = MataKuliah::findOrFail($mk_id);
                Konversi::create([
                    'mbkm_id' => $request->mbkm_id,
                    'nama_nilai_matkul' => $matkul->mk,
                    'kode_matkul' => $matkul->kode_mk,
                    'sks' => $matkul->sks,
                    'jenis_matkul' => $matkul->jenis,
                ]);
            }
        }
        // Store Penilaian MBKM
        $penilaianMbkm = $request->penilaian_mbkm;
        if (is_array($penilaianMbkm)) {
            foreach ($penilaianMbkm as $value) {
                PenilaianMbkm::create([
                    'mbkm_id' => $request->mbkm_id,
                    'nama_penilaian' => $value["nama_nilai_mbkm"],
                    'nilai' => $value["nilai_mbkm"],
                ]);
            }
        }
        // MBKM
        $mbkm = Mbkm::find($request->mbkm_id);
        $mbkm->status = "Usulan konversi nilai";
        $mbkm->catatan = "";
        // Jika Upload Transkrip
        if ($request->hasFile('transkrip')) {
            $files =  time() . '.' . $request->file->extension();
            Storage::putFileAs('public/transkrip_mbkm', $request->file('transkrip'), $files);
            $currentTranskrip = $mbkm->transkrip;
            if ($currentTranskrip) {
                Storage::delete("public/" . $currentTranskrip->file);
                $currentTranskrip->file = "sertifikat/" . $files;
                $currentTranskrip->update();
            } else {
                $mbkm->transkrip = "transkrip_mbkm/" . $files;
            }
        }
        // flush Upadte
        $mbkm->update();
        return redirect()->route("mbkm");
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
