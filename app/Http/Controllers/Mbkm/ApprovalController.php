<?php

namespace App\Http\Controllers\Mbkm;

use App\Http\Controllers\Controller;
use App\Models\Mbkm\Konversi;
use App\Models\Mbkm\Mbkm;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ApprovalController extends Controller
{
    public function approveUsulan($id)
    {
        $km = Mbkm::find($id);
        $km->status = 'Disetujui';
        $km->tanggal_disetujui = date('Y-m-d H:i:s');
        $km->update();
        // Mengubah Status Usulan yang lainnya menjadi DITOLAK
        Mbkm::where("mahasiswa_nim", $km->mahasiswa_nim)
            ->where("id", "!=", $id)
            ->where("status", "Usulan")
            ->update([
                "status" => "Ditolak",
                "catatan" => "Salah satu usulan telah DITERIMA"
            ]);
        Alert::success('Berhasil!', 'Berhasil menyetujui usulan MBKM')->showConfirmButton('Ok', '#28a745');
        return redirect()->back();
    }

    public function tolakUsulan(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required',
        ]);
        // dd($request->all());
        $km = Mbkm::find($id);
        $km->status = 'Ditolak';
        $km->catatan = $request->catatan;
        $km->update();
        return redirect()->back();
    }

    public function konversi($id)
    {
        $mbkm = Mbkm::findOrFail($id);
        $konversi = Konversi::where("mbkm_id", $id)->get();
        return view("mbkm.prodi.konversi", compact("mbkm", "konversi"));
    }
    public function approveKonversi(Request $request, $id)
    {
        foreach ($request->nilai_disetujui as $key => $value) {
            Konversi::where("id", $key)->update(["nilai_sks" => $value]);
        }
        $km = Mbkm::findOrFail($id);
        $km->status = 'Konversi diterima';
        $km->updated_at = date('Y-m-d H:i:s');
        $km->update();
        return redirect()->route("mbkm.prodi");
    }

    public function approveStaff($id)
    {
        $km = mbkm::findOrFail($id);
        $km->status = 'Nilai sudah keluar';
        $km->update();
        return back();
    }
    public function tolakKonversi(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required',
        ]);
        $km = Mbkm::find($id);
        $km->status = 'Konversi Ditolak';
        $km->catatan = $request->catatan;
        $km->updated_at = date('Y-m-d H:i:s');
        $km->update();
        return back();
    }

    public function approvePengunduran($id)
    {
        $km = mbkm::findOrFail($id);
        $km->status = 'Mengundurkan diri';
        $km->update();
        return redirect()->route("mbkm.prodi");
    }
}
