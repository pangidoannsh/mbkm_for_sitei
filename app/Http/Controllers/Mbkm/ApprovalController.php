<?php

namespace App\Http\Controllers\Mbkm;

use App\Http\Controllers\Controller;
use App\Models\Mbkm\Mbkm;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function approveUsulan($id)
    {
        $km = Mbkm::find($id);
        $km->status = 'Disetujui';
        $km->updated_at = date('Y-m-d H:i:s');
        $km->update();
        // Mengubah Status Usulan yang lainnya menjadi DITOLAK
        Mbkm::where("mahasiswa_nim", $km->mahasiswa_nim)
            ->where("id", "!=", $id)
            ->where("status", "Usulan")
            ->update([
                "status" => "Ditolak",
                "catatan" => "Salah satu usulan telah DITERIMA"
            ]);
        return back();
    }

    public function tolakUsulan(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required',
        ]);
        $km = Mbkm::find($id);
        $km->status = 'Ditolak';
        $km->catatan = $request->catatan;
        $km->updated_at = date('Y-m-d H:i:s');
        $km->update();
        return back();
    }

    public function approveKonversi(Request $request, $id)
    {
        $km = Mbkm::find($id);
        $km->status = 'Konversi diterima';
        $km->updated_at = date('Y-m-d H:i:s');
        $km->update();
        return back();
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
