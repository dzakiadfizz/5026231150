<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LatihanA1Controller extends Controller
{
    public function index5()
    {
        $counter = DB::table('pagecounter')->where('pagecounter_ID', 1)->first();
        $jumlahpengunjung = 0;
        if($counter){
            $newjumlah =$counter-> jumlah+1;
            DB::table('pagecounter')
            ->where('pagecounter_ID',1)
            ->update(['jumlah'=>$newjumlah]);
        }
        $jumlahpengunjung = $newjumlah;
        return view('index5', ['jumlahpengunjung' => $jumlahpengunjung]);
    }

}
