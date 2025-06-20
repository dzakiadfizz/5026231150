<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;

class NilaiController extends Controller
{
    public function index() {
        $data = Nilai::all();
        return view('eas.indexnilai', compact('data'));
    }

    public function create(){
        return view('eas.tambahnilai');
    }

    public function store(Request $request)
{
    Nilai::create([
        'nomorinduksiswa' => $request->nrp,
        'nilaiangka' => $request->nilaiangka,
        'sks' => $request->sks,

    ]);

    return redirect('/eas');
}

}
