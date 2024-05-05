<?php

namespace App\Http\Controllers\Mbkm;

use App\Http\Controllers\Controller;
use App\Models\Mbkm\Logbook;
use App\Models\Mbkm\Mbkm;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LogbookController extends Controller
{
    public function index($mbkmId)
    {
        $mbkm = Mbkm::findOrFail($mbkmId);
        $logbooks = Logbook::where("mbkm_id", $mbkmId)->orderBy("input_date")->get();
        if ($logbooks->count() == 0) {
            foreach (self::generateMonthArray($mbkm->mulai_kegiatan, $mbkm->selesai_kegiatan) as $date) {
                Logbook::create([
                    "mbkm_id" => $mbkmId,
                    "input_date" => $date
                ]);
            }
            $logbooks = Logbook::where("mbkm_id", $mbkmId)->orderBy("input_date")->get();
        }
        return view("mbkm.logbook", compact("logbooks", "mbkm"));
    }

    public function store(Request $request, $id)
    {
        $logbook = Logbook::findOrFail($id);
        $file = $request->file('file');
        $logbook->file = str_replace('public/', '', $file->store('public/logbook'));
        $logbook->update();

        return back();
    }

    static function generateMonthArray($startDate, $endDate)
    {
        // Ubah string tanggal menjadi objek Carbon
        $startDate = Carbon::createFromFormat('Y-m-d', $startDate);
        $endDate = Carbon::createFromFormat('Y-m-d', $endDate);

        // Inisialisasi array untuk menyimpan bulan-bulan
        $monthArray = [];

        // Tambahkan tanggal mulai kegiatan
        $currentDate = $startDate;
        $monthArray[] = $currentDate->toDateString();

        // Tambahkan satu bulan pada setiap iterasi sampai mencapai tanggal selesai
        while ($currentDate->lessThan($endDate)) {
            $currentDate->addMonths(1);
            if ($currentDate->greaterThanOrEqualTo($endDate)) {
                break;
            }
            $monthArray[] = $currentDate->toDateString();
        }

        return $monthArray;
    }
}
