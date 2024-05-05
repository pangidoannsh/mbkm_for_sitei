<?php

namespace App\Http\Controllers\Mbkm;

use App\Http\Controllers\Controller;
use App\Models\Konsentrasi;
use App\Models\Mbkm\Konversi;
use App\Models\Mbkm\Mbkm;
use App\Models\Mbkm\Program;
use App\Models\Mbkm\SertifikatMbkm;
use App\Models\Prodi;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MbkmController extends Controller
{
    public function mahasiswaIndex()
    {
        $prodi = Prodi::all();
        $konsentrasi = Konsentrasi::all();
        $program = Program::all();
        $mbkm = Mbkm::where('mahasiswa_nim', Auth::guard("mahasiswa")->user()->nim)
            ->where(function ($query) {
                $query->where("status", "!=", "Ditolak")
                    ->where("status", "!=", "Mengundurkan diri")
                    ->where("status", "!=", "Nilai sudah keluar");
            })
            ->orderBy("updated_at", "DESC")->get();
        return view('mbkm.mahasiswa.index', compact('mbkm', 'prodi', 'konsentrasi', 'program'));
    }

    public function prodiIndex()
    {
        $mbkm = Mbkm::where("status", "Usulan")
            ->orWhere("status", "Usulan konversi nilai")
            ->orWhere("status", "Usulan pengunduran diri")
            ->get();
        return view('mbkm.prodi.index', compact('mbkm'));
    }

    public function staffIndex()
    {
        $mbkm = mbkm::where("status", "Konversi diterima")->get();
        return view('mbkm.staff.index', compact('mbkm'));
    }

    public function mbkmBerjalan()
    {
        $mbkm = Mbkm::where("status", "Disetujui")->get();
        return view('mbkm.prodi.berjalan', compact('mbkm'));
    }
    public function mahasiswaRiwayat()
    {
        $mbkm = Mbkm::where('mahasiswa_nim', Auth::guard("mahasiswa")->user()->nim)
            ->where(function ($query) {
                $query->where("status", "Ditolak")
                    ->orWhere("status", "Mengundurkan diri")
                    ->orWhere("status", "Nilai sudah keluar");
            })
            ->orderBy("created_at", "DESC")->get();
        return view('mbkm.mahasiswa.riwayat', compact('mbkm'));
    }

    public function prodiRiwayat()
    {
        $mbkm = mbkm::where("status", "Ditolak")
            ->orWhere("status", "Nilai sudah keluar")
            ->orWhere("status", "Konversi diterima")
            ->orWhere("status", "Mengundurkan diri")
            ->get();
        return view('mbkm.prodi.riwayat', compact('mbkm'));
    }

    public function staffRiwayat()
    {
        $mbkm = mbkm::where("status", "Mengundurkan diri")
            ->orWhere("status", "Nilai sudah keluar")
            ->orWhere("status", "Ditolak")
            ->get();
        return view('mbkm.staff.riwayat', compact('mbkm'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'program_id' => 'required',
            'periode_mbkm' => 'required',
            'perusahaan' => 'required',
            'alamat' => 'required',
            'bidang_usaha' => 'required',
            'judul' => 'required',
            'rincian' => 'required',
            'mulai_kegiatan' => 'required',
            'selesai_kegiatan' => 'required',
            'batas' => 'required',
        ]);
        $mahasiswa = Auth::guard("mahasiswa")->user();
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $rincian = $request->file('rincian');

        $mbkm = Mbkm::create([
            'mahasiswa_nim' => $mahasiswa->nim,
            'program_id' => $request->program_id,
            'periode_mbkm' => $request->periode_mbkm,
            'prodi_id' => $request->prodi_id,
            'konsentrasi_id' => $request->konsentrasi_id,
            'perusahaan' => $request->perusahaan,
            'alamat' => $request->alamat,
            'bidang_usaha' => $request->bidang_usaha,
            'judul' => $request->judul,
            'mulai_kegiatan' => $request->mulai_kegiatan,
            'selesai_kegiatan' => $request->selesai_kegiatan,
            'rincian' => str_replace('public/', '', $rincian->store('public/mbkm')),
            'batas' => $request->batas,

        ]);
        return redirect()->route('mbkm');
    }

    public function detail($id)
    {
        $mbkm = Mbkm::where('id', $id)->first();
        $konversi = Konversi::where("mbkm_id", $mbkm->id)->get();
        $sertifikat = SertifikatMbkm::where("mbkm_id", $mbkm->id)->first();
        return view('mbkm.detail', compact('mbkm', 'konversi', 'sertifikat'));
    }

    public function destroy($id)
    {
        $data = Mbkm::findOrFail($id);
        Storage::delete("public/" . $data->rincian);
        $data->delete();
        return back();
    }

    public function undurDiri($id)
    {
        $mbkm = Mbkm::findOrFail($id);
        return view("mbkm.undur-diri", compact('mbkm'));
    }

    public function storeUndurDiri(Request $request, $id)
    {
        $mbkm = Mbkm::findOrFail($id);
        $mbkm->status = "Usulan pengunduran diri";
        $surat = $request->file('file');
        $mbkm->surat_pengunduran = str_replace('public/', '', $surat->store('public/mbkm'));
        $mbkm->alasan_undur_diri = $request->alasan;
        $mbkm->update();
        return redirect()->route("mbkm");
    }

    public function uploaded(Request $request, $id)
    {
        $km = Mbkm::findOrFail($id);
        $km->status = 'Usulan konversi nilai';
        $km->update();
        return back();
    }

    public function downloadPdf($id)
    {
        $mbkm = mbkm::findOrFail($id);
        $konversi = Konversi::where("mbkm_id", $id)->get();
        $pdf = PDF::loadview('mbkm.print', compact('konversi', 'mbkm'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('konversi.pdf');
    }
}
