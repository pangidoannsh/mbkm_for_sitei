<?php

namespace App\Http\Controllers;

use App\Models\PenilaianKP;
use Illuminate\Http\Request;
use App\Models\PenjadwalanKP;
use App\Models\PendaftaranKP;
use App\Models\PenilaianKPPenguji;
use Illuminate\Support\Facades\Auth;
use App\Models\PenilaianKPPembimbing;
use Illuminate\Support\Facades\Crypt;

class PenilaianKPController extends Controller
{
    public function index()
    {
        $dosen = PenjadwalanKP::where('penguji_nip', Auth::user()->nip)->where('status_seminar', 0)->get();
        return view('penilaiankp.index', [
            'penjadwalan_kps' => $dosen,
        ]);
    }

    public function create($id)
    {
        $decrypted = Crypt::decryptString($id);
        $penjadwalan = PenjadwalanKP::findOrFail($decrypted);        
        $ceknilaipenguji = PenilaianKPPenguji::where('penjadwalan_kp_id' , $decrypted)->where('penguji_nip', $penjadwalan->penguji_nip)->first();

        if ($ceknilaipenguji == null) {
            $nilaipenguji = '';
        }
        else {
            $nilaipenguji = PenilaianKPPenguji::where('penjadwalan_kp_id', $decrypted)->where('penguji_nip', $penjadwalan->penguji_nip)->first();
        }

        $ceknilaipembimbing = PenilaianKPPembimbing::where('penjadwalan_kp_id', $decrypted)->where('pembimbing_nip', $penjadwalan->pembimbing_nip)->first();
        if ($ceknilaipembimbing == null) {
            $nilaipembimbing = '';
        }
        else {
            $nilaipembimbing = PenilaianKPPembimbing::where('penjadwalan_kp_id', $decrypted)->where('pembimbing_nip', $penjadwalan->pembimbing_nip)->first();
        }

        return view('penilaiankp.create', [
            'kp' => PenjadwalanKP::find($decrypted),                   
            'penjadwalan' => $penjadwalan,
            'nilaipenguji' => $nilaipenguji,
            'nilaipembimbing' => $nilaipembimbing,
            
        ]);  

    }

    public function store_pembimbing(Request $request, $id)
    {

        $penilaian = new PenilaianKPPembimbing;
        $penilaian->presentasi = $request->presentasi;       
        $penilaian->materi = $request->materi;
        $penilaian->tanya_jawab = $request->tanya_jawab;
        $penilaian->total_nilai_angka = $request->total_nilai_angka;
        $penilaian->total_nilai_huruf = $request->total_nilai_huruf;        

        if ($request->nilai_pembimbing_lapangan) {
            $penilaian->nilai_pembimbing_lapangan = $request->nilai_pembimbing_lapangan;
        }

        if ($request->catatan1) {
            $penilaian->catatan1 = $request['catatan1'];
        }
        if ($request->catatan2) {
            $penilaian->catatan2 = $request['catatan2'];
        }
        if ($request->catatan3) {
            $penilaian->catatan3 = $request['catatan3'];
        }

        $penilaian->pembimbing_nip = auth()->user()->nip;
        $penilaian->penjadwalan_kp_id = $id;
        $penilaian->save();        

        return redirect('/penilaian-kp/edit/' . Crypt::encryptString($id))->with('message', 'Nilai Berhasil Diinput!');    
    }

    public function store_penguji(Request $request, $id)
    {

        $penilaian = new PenilaianKPPenguji;
        $penilaian->presentasi = $request->presentasi;       
        $penilaian->materi = $request->materi;
        $penilaian->tanya_jawab = $request->tanya_jawab;
        $penilaian->total_nilai_angka = $request->total_nilai_angka;
        $penilaian->total_nilai_huruf = $request->total_nilai_huruf;

        if ($request->revisi_naskah1) {
            $penilaian->revisi_naskah1 = $request->revisi_naskah1;
        }
        if ($request->revisi_naskah2) {
            $penilaian->revisi_naskah2 = $request->revisi_naskah2;
        }
        if ($request->revisi_naskah3) {
            $penilaian->revisi_naskah3 = $request->revisi_naskah3;
        }
        if ($request->revisi_naskah4) {
            $penilaian->revisi_naskah4 = $request->revisi_naskah4;
        }
        if ($request->revisi_naskah5) {
            $penilaian->revisi_naskah5 = $request->revisi_naskah5;
        }        

        $penilaian->penguji_nip = auth()->user()->nip;
        $penilaian->penjadwalan_kp_id = $id;
        $penilaian->save();        

        return redirect('/penilaian-kp/edit/' . Crypt::encryptString($id))->with('message', 'Nilai Berhasil Diinput!');    
    }

    public function edit($id)
    {                
        $decrypted = Crypt::decryptString($id);
        // $pendaftarankp_id = PendaftaranKP::find($id);
        $cari_pembimbing = PenilaianKPPembimbing::where('penjadwalan_kp_id', $decrypted)->where('pembimbing_nip', auth()->user()->nip)->count();

        if ($cari_pembimbing == 0) {            
            return view('penilaiankp.edit', [
                'kp' => PenilaianKPPenguji::where('penjadwalan_kp_id', $decrypted)->where('penguji_nip', auth()->user()->nip)->first(),
                // 'pendaftaran_kp' =>  PendaftaranKP::where('id', $pendaftarankp_id)->where('dosen_pembimbing_nip', Auth::user()->nip)->get(),  
               

            ]);
        } 
        else {
                        
            $penjadwalan = PenjadwalanKP::find($decrypted);        
            $ceknilaipenguji = PenilaianKPPenguji::where('penjadwalan_kp_id' , $decrypted)->where('penguji_nip', $penjadwalan->penguji_nip)->first();

            if ($ceknilaipenguji == null) {
                $nilaipenguji = '';
            }
            else {
                $nilaipenguji = PenilaianKPPenguji::where('penjadwalan_kp_id', $decrypted)->where('penguji_nip', $penjadwalan->penguji_nip)->first();                
            }

            $ceknilaipembimbing = PenilaianKPPembimbing::where('penjadwalan_kp_id', $decrypted)->where('pembimbing_nip', $penjadwalan->pembimbing_nip)->first();

            if ($ceknilaipembimbing == null) {
                $nilaipembimbing = '';
            }
            else {
                $nilaipembimbing = PenilaianKPPembimbing::where('penjadwalan_kp_id', $decrypted)->where('pembimbing_nip', $penjadwalan->pembimbing_nip)->first();
            }

            $kp = PenilaianKPPembimbing::where('penjadwalan_kp_id', $decrypted)->where('pembimbing_nip', auth()->user()->nip)->first();

            return view('penilaiankp.edit', [
                'kp' => $kp,                           
                'penjadwalan' => $penjadwalan,
                'nilaipenguji' => $nilaipenguji,
                'nilaipembimbing' => $nilaipembimbing,
                // 'pendaftaran_kp' =>$pendaftarankp_id,
                // 'pendaftaran_kp' =>  PendaftaranKP::where('id', $id)->where('dosen_pembimbing_nip', Auth::user()->nip)->get(),   
            ]);

        }
    }

    public function update_penguji(Request $request, $id)
    {
        $rules = [
            'presentasi' => 'required',
            'materi' => 'required',
            'tanya_jawab' => 'required',            
            'total_nilai_angka' => 'required',
            'total_nilai_huruf' => 'required',
        ];

        if ($request->revisi_naskah1) {
            $rules['revisi_naskah1'] = 'required';
        }
        if ($request->revisi_naskah2) {
            $rules['revisi_naskah2'] = 'required';
        }
        if ($request->revisi_naskah3) {
            $rules['revisi_naskah3'] = 'required';
        }
        if ($request->revisi_naskah4) {
            $rules['revisi_naskah4'] = 'required';
        }
        if ($request->revisi_naskah5) {
            $rules['revisi_naskah5'] = 'required';
        }

        $validatedData = $request->validate($rules);

        $penilaian = PenilaianKPPenguji::where('id', $id)->where('penguji_nip', auth()->user()->nip)->first();   
        $penilaian->presentasi = $validatedData['presentasi'];
        $penilaian->materi = $validatedData['materi'];
        $penilaian->tanya_jawab = $validatedData['tanya_jawab'];        
        $penilaian->total_nilai_angka = $validatedData['total_nilai_angka'];
        $penilaian->total_nilai_huruf = $validatedData['total_nilai_huruf'];

        if ($request->revisi_naskah1) {
            $penilaian->revisi_naskah1 = $validatedData['revisi_naskah1'];
        }
        if ($request->revisi_naskah2) {
            $penilaian->revisi_naskah2 = $validatedData['revisi_naskah2'];
        }
        if ($request->revisi_naskah3) {
            $penilaian->revisi_naskah3 = $validatedData['revisi_naskah3'];
        }
        if ($request->revisi_naskah4) {
            $penilaian->revisi_naskah4 = $validatedData['revisi_naskah4'];
        }
        if ($request->revisi_naskah5) {
            $penilaian->revisi_naskah5 = $validatedData['revisi_naskah5'];
        }
        
        $penilaian->update();

        return redirect('/penilaian')->with('message', 'Nilai Berhasil Diedit!');    

    }

    public function update_pembimbing(Request $request, $id)
    {
        $rules = [
            'presentasi' => 'required',
            'materi' => 'required',
            'tanya_jawab' => 'required',            
            'total_nilai_angka' => 'required',
            'total_nilai_huruf' => 'required',            
        ];

        if ($request->nilai_pembimbing_lapangan) {
            $rules['nilai_pembimbing_lapangan'] = 'required';
        }

        if ($request->catatan1) {
            $rules['catatan1'] = 'required';
        }
        if ($request->catatan2) {
            $rules['catatan2'] = 'required';
        }
        if ($request->catatan3) {
            $rules['catatan3'] = 'required';
        }

        $validatedData = $request->validate($rules);
        $edit = PenilaianKPPembimbing::where('id', $id)->where('pembimbing_nip', auth()->user()->nip)->first();
        $edit->presentasi = $validatedData['presentasi'];
        $edit->materi = $validatedData['materi'];
        $edit->tanya_jawab = $validatedData['tanya_jawab'];                
        $edit->total_nilai_angka = $validatedData['total_nilai_angka'];
        $edit->total_nilai_huruf = $validatedData['total_nilai_huruf']; 

        if ($request->nilai_pembimbing_lapangan) {
            $edit->nilai_pembimbing_lapangan = $validatedData['nilai_pembimbing_lapangan'];
        }

        if ($request->catatan1) {
            $edit->catatan1 = $validatedData['catatan1'];
        }
        if ($request->catatan2) {
            $edit->catatan2 = $validatedData['catatan2'];
        }
        if ($request->catatan3) {
            $edit->catatan3 = $validatedData['catatan3'];
        }

        $edit->update();

        return redirect('/penilaian')->with('message', 'Nilai Berhasil Diedit!');    
    }

    public function riwayat()
    {
        $riwayat = PenjadwalanKP::where('penguji_nip', Auth::user()->nip)->where('status_seminar', 1)->get();

        return view('penilaiankp.riwayat-penilaian-kp', [
            'penjadwalan_kps' => $riwayat,
        ]);
    }
}