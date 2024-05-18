<?php

namespace App\Http\Controllers\Mbkm;

use App\Http\Controllers\Controller;
use App\Models\Konsentrasi;
use App\Models\Mbkm\Konversi;
use App\Models\Mbkm\Logbook;
use App\Models\Mbkm\Mbkm;
use App\Models\Mbkm\Program;
use App\Models\Mbkm\SertifikatMbkm;
use App\Models\Prodi;
use App\Models\Semester;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\URL;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MbkmController extends Controller
{
    public function mahasiswaIndex()
    {
        $prodi = Prodi::all();
        $konsentrasi = Konsentrasi::all();
        $program = Program::all();
        $mbkm = Mbkm::usulanMahasiswa(Auth::guard("mahasiswa")->user()->nim)->get();
        $semesters = Semester::getSimpleSemester();
        $countRiwayat = Mbkm::riwayatMahasiswa(Auth::guard("mahasiswa")->user()->nim)->count();
        return view('mbkm.mahasiswa.index', compact('mbkm', 'prodi', 'konsentrasi', 'program', 'countRiwayat', 'semesters'));
    }

    public function prodiIndex()
    {
        $prodiId = Auth::guard("dosen")->user()->prodi_id;
        $mbkm = Mbkm::usulanProdi($prodiId)->orderBy("batas", "asc")->get();
        $countRiwayat = Mbkm::riwayatProdi($prodiId)->count();
        $countBerjalan = Mbkm::berjalanProdi($prodiId)->count();
        return view('mbkm.prodi.index', compact('mbkm', 'countRiwayat', 'countBerjalan'));
    }

    public function staffIndex()
    {
        $mbkm = mbkm::where("status", "Konversi diterima")->get();
        return view('mbkm.staff.index', compact('mbkm'));
    }

    public function mbkmBerjalan()
    {
        $prodiId = Auth::guard("dosen")->user()->prodi_id;
        $countUsulan = Mbkm::usulanProdi($prodiId)->count();
        $countRiwayat = Mbkm::riwayatProdi($prodiId)->count();
        $mbkm = Mbkm::berjalanProdi($prodiId)->get();
        return view('mbkm.prodi.berjalan', compact('mbkm', 'countUsulan', 'countRiwayat'));
    }
    public function mahasiswaRiwayat()
    {
        $mbkm = Mbkm::riwayatMahasiswa(Auth::guard("mahasiswa")->user()->nim)->get();
        $countUsulan = Mbkm::usulanMahasiswa(Auth::guard("mahasiswa")->user()->nim)->count();
        return view('mbkm.mahasiswa.riwayat', compact('mbkm', 'countUsulan'));
    }

    public function prodiRiwayat()
    {
        $prodiId = Auth::guard("dosen")->user()->prodi_id;
        $mbkm = Mbkm::riwayatProdi($prodiId)->get();
        $countUsulan = Mbkm::usulanProdi($prodiId)->count();
        $countBerjalan = Mbkm::berjalanProdi($prodiId)->count();
        return view('mbkm.prodi.riwayat', compact('mbkm', 'countUsulan', 'countBerjalan'));
    }

    public function staffRiwayat()
    {
        $mbkm = Mbkm::where("status", "Konversi diterima")
            ->orWhere("status", "Nilai sudah keluar")
            ->get();
        return view('mbkm.staff.riwayat', compact('mbkm'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'program_id' => 'required',
            'semester' => 'required',
            'perusahaan' => 'required',
            'alamat' => 'required',
            'bidang_usaha' => 'required',
            'judul' => 'required',
            'rincian' => 'mimes:pdf|max:200',
            'mulai_kegiatan' => 'required',
            'selesai_kegiatan' => 'required',
            'batas' => 'required',
        ]);
        $mahasiswa = Auth::guard("mahasiswa")->user();
        if ($validator->fails()) {
            Alert::error('Gagal!', 'Gagal membuat usulan')->showConfirmButton('Ok', '#F27474');
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $mahasiswa = Auth::guard("mahasiswa")->user();
        $rincian = $request->file('rincian');
        if ($rincian) {
            Mbkm::create([
                'mahasiswa_nim' => $mahasiswa->nim,
                'program_id' => $request->program_id,
                'semester' => $request->semester,
                'prodi_id' => $mahasiswa->prodi_id,
                'konsentrasi_id' => $mahasiswa->konsentrasi_id,
                'perusahaan' => $request->perusahaan,
                'alamat' => $request->alamat,
                'bidang_usaha' => $request->bidang_usaha,
                'judul' => $request->judul,
                'mulai_kegiatan' => $request->mulai_kegiatan,
                'selesai_kegiatan' => $request->selesai_kegiatan,
                'rincian_link' => $request->rincian_link,
                'rincian' => str_replace('public/', '', $rincian->store('public/mbkm')),
                'batas' => $request->batas,
            ]);
        } else {
            Mbkm::create([
                'mahasiswa_nim' => $mahasiswa->nim,
                'program_id' => $request->program_id,
                'semester' => $request->semester,
                'prodi_id' => $mahasiswa->prodi_id,
                'konsentrasi_id' => $mahasiswa->konsentrasi_id,
                'perusahaan' => $request->perusahaan,
                'alamat' => $request->alamat,
                'bidang_usaha' => $request->bidang_usaha,
                'judul' => $request->judul,
                'mulai_kegiatan' => $request->mulai_kegiatan,
                'selesai_kegiatan' => $request->selesai_kegiatan,
                'rincian_link' => $request->rincian_link,
                'batas' => $request->batas,
            ]);
        }
        Alert::success('Berhasil!', 'Berhasil membuat usulan baru')->showConfirmButton('Ok', '#28a745');
        return redirect()->route('mbkm');
    }

    public function detail($id)
    {
        $mbkm = Mbkm::where('id', $id)->first();
        $konversi = Konversi::where("mbkm_id", $mbkm->id)->get();
        $sertifikat = SertifikatMbkm::where("mbkm_id", $mbkm->id)->first();
        // $logbook = Logbook::where("mbkm_id",$id)->get();
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
        Alert::success('Berhasil!', 'Berhasil mengajukan konversi nilai')->showConfirmButton('Ok', '#28a745');
        return redirect()->back();
    }

    public function downloadPdf($id)
    {
        $mbkm = mbkm::findOrFail($id);
        $konversi = Konversi::where("mbkm_id", $id)->get();
        $qrcode = base64_encode(QrCode::format('svg')->size(80)->errorCorrection('H')->generate(URL::to('/mbkm') . '/' . encrypt($mbkm->id) . "/public"));
        $pdf = PDF::loadview('mbkm.print', compact('konversi', 'mbkm', 'qrcode'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('konversi.pdf');
    }
}
