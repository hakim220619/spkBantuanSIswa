<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    function view()
    {
        $data['title'] = "Kriteria";
        $data['kriteria'] = DB::table('kriteria')->get();
        return view('backend.kriteria.view', $data);
    }
    function editProses(Request $request) {
        // dd($request->all());
        DB::table('kriteria')
        ->where('id', $request->id)
        ->update([
            'nama_kriteria' => $request->nama_kriteria,
            'nilai' => $request->nilai,
        ]);
        return redirect('kriteria');
    }
}
