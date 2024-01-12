<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ImportStudents;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StudentsController extends Controller
{
    function view()
    {
        $data['title'] = "Students";
        $data['prt'] = DB::table('detail_kriteria')->where('keys_kriteria', 100)->get();
        $data['jak'] = DB::table('detail_kriteria')->where('keys_kriteria', 200)->get();
        $data['usia'] = DB::table('detail_kriteria')->where('keys_kriteria', 300)->get();
        $data['ss'] = DB::table('detail_kriteria')->where('keys_kriteria', 400)->get();
        $data['kk'] = DB::table('detail_kriteria')->where('keys_kriteria', 500)->get();
        $data['bp'] = DB::table('detail_kriteria')->where('keys_kriteria', 600)->get();
        $data['kr'] = DB::table('detail_kriteria')->where('keys_kriteria', 700)->get();
        return view('backend.students.view', $data);
    }
    public function load_data()
    {
        $data = DB::select("SELECT case when s.hasil >= 0.7 then 'LAYAK' else 'TIDAK LAYAK' end as hasil, s.id, s.nis, s.full_name,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.prt and dk.keys_kriteria = '100' ) as prt,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.jak and dk.keys_kriteria = '200' ) as jak,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.usia and dk.keys_kriteria = '300' ) as usia,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.ss and dk.keys_kriteria = '400' ) as ss,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.kk and dk.keys_kriteria = '500' ) as kk,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.bp and dk.keys_kriteria = '600' ) as bp,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.kr and dk.keys_kriteria = '700' ) as kr
        FROM students s ORDER BY s.hasil DESC");
        echo json_encode($data);
    }
    function UploadStudents(Request $request)
    {
        // dd($request->all());

        Excel::import(new ImportStudents, $request->file('file'));

        return redirect()->back();
    }
    function proses()
    {
        $getData = DB::table('students')->get();
        $getprt = DB::table('students')->orderBy('prt', 'desc')->first();
        $getjak = DB::table('students')->orderBy('jak', 'desc')->first();
        $getusia = DB::table('students')->orderBy('usia', 'desc')->first();
        $getss = DB::table('students')->orderBy('ss', 'desc')->first();
        $getkk = DB::table('students')->orderBy('kk', 'desc')->first();
        $getbp = DB::table('students')->orderBy('bp', 'desc')->first();
        $getkr = DB::table('students')->orderBy('kr', 'desc')->first();
        // dd($getData);
        $kriteria = DB::table('kriteria')->get();
        foreach ($getData as $gd) {
            // dd($gd->hasil);
            if ($gd->hasil == null) {
                $CounSum = ((($gd->prt / $getprt->prt) * $kriteria[0]->nilai) +
                    (($gd->jak / $getjak->jak) * $kriteria[1]->nilai) +
                    (($gd->usia / $getusia->usia) * $kriteria[2]->nilai) +
                    (($gd->ss / $getss->ss) * $kriteria[3]->nilai) +
                    (($gd->kk / $getkk->kk) * $kriteria[4]->nilai) +
                    (($gd->bp / $getbp->bp) * $kriteria[5]->nilai) +
                    (($gd->kr / $getkr->kr) * $kriteria[6]->nilai));

                DB::table('students')->where('id', $gd->id)->update(['hasil' => $CounSum]);
            }
        }
        return response()->json([
            'success' => true
        ]);
    }
    function addProses(Request $request)
    {
        // dd($request->all());
        DB::table('students')->insert([
            'nis' => $request['nis'],
            'full_name' => $request['full_name'],
            'prt' => $request['prt'],
            'jak' => $request['jak'],
            'usia' => $request['usia'],
            'ss' => $request['ss'],
            'kk' => $request['kk'],
            'bp' => $request['bp'],
            'kr' => $request['kr'],
        ]);
        return redirect('students');
    }
    function delete()
    {
        DB::table('students')->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
