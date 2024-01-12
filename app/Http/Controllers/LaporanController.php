<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class LaporanController extends Controller
{
    function view()
    {
        $data['title'] = "Laporan";
        $data['laporan'] = DB::table('students')->get();
        return view('backend.laporan.view', $data);
    }
    public function load_data()
    {
        $request = request();
        // dd($request['id']);
        if ($request['id'] == 'all') {
            $data = DB::select("SELECT case when s.hasil >= 0.7 then 'LAYAK' else 'TIDAK LAYAK' end as hasil, s.id, s.nis, s.full_name,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.prt and dk.keys_kriteria = '100' ) as prt,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.jak and dk.keys_kriteria = '200' ) as jak,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.usia and dk.keys_kriteria = '300' ) as usia,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.ss and dk.keys_kriteria = '400' ) as ss,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.kk and dk.keys_kriteria = '500' ) as kk,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.bp and dk.keys_kriteria = '600' ) as bp,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.kr and dk.keys_kriteria = '700' ) as kr
        FROM students s ORDER BY s.hasil DESC");
        } elseif (isset($request['id'])) {
            $data = DB::select("SELECT case when s.hasil >= 0.7 then 'LAYAK' else 'TIDAK LAYAK' end as hasil, s.id, s.nis, s.full_name,
            (select jenis from detail_kriteria dk WHERE dk.nilai=s.prt and dk.keys_kriteria = '100' ) as prt,
            (select jenis from detail_kriteria dk WHERE dk.nilai=s.jak and dk.keys_kriteria = '200' ) as jak,
            (select jenis from detail_kriteria dk WHERE dk.nilai=s.usia and dk.keys_kriteria = '300' ) as usia,
            (select jenis from detail_kriteria dk WHERE dk.nilai=s.ss and dk.keys_kriteria = '400' ) as ss,
            (select jenis from detail_kriteria dk WHERE dk.nilai=s.kk and dk.keys_kriteria = '500' ) as kk,
            (select jenis from detail_kriteria dk WHERE dk.nilai=s.bp and dk.keys_kriteria = '600' ) as bp,
            (select jenis from detail_kriteria dk WHERE dk.nilai=s.kr and dk.keys_kriteria = '700' ) as kr
            FROM students s where s.id = ".$request['id']." ORDER BY s.hasil DESC");
        } else {
            $data = DB::select("SELECT case when s.hasil >= 0.7 then 'LAYAK' else 'TIDAK LAYAK' end as hasil, s.id, s.nis, s.full_name,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.prt and dk.keys_kriteria = '100' ) as prt,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.jak and dk.keys_kriteria = '200' ) as jak,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.usia and dk.keys_kriteria = '300' ) as usia,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.ss and dk.keys_kriteria = '400' ) as ss,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.kk and dk.keys_kriteria = '500' ) as kk,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.bp and dk.keys_kriteria = '600' ) as bp,
        (select jenis from detail_kriteria dk WHERE dk.nilai=s.kr and dk.keys_kriteria = '700' ) as kr
        FROM students s ORDER BY s.hasil DESC");
        }
        // dd($data);
        echo json_encode($data);
    }
    public function cetakExcel(Request $request)
    {
        // dd($request->all());
        $sql = '';
        if ($request['id'] != 'all') {
            $sql .= "where s.id = " . $request['id'] . "";
        } elseif ($request['id'] == 'all') {
            $sql .= $request['id'] != null ? "where 1=1" : "";
        }


        // dd($sql);
        if ($request != "") {
            $data = DB::select("SELECT case when s.hasil >= 0.7 then 'LAYAK' else 'TIDAK LAYAK' end as hasil, s.id, s.nis, s.full_name,
            (select jenis from detail_kriteria dk WHERE dk.nilai=s.prt and dk.keys_kriteria = '100' ) as prt,
            (select jenis from detail_kriteria dk WHERE dk.nilai=s.jak and dk.keys_kriteria = '200' ) as jak,
            (select jenis from detail_kriteria dk WHERE dk.nilai=s.usia and dk.keys_kriteria = '300' ) as usia,
            (select jenis from detail_kriteria dk WHERE dk.nilai=s.ss and dk.keys_kriteria = '400' ) as ss,
            (select jenis from detail_kriteria dk WHERE dk.nilai=s.kk and dk.keys_kriteria = '500' ) as kk,
            (select jenis from detail_kriteria dk WHERE dk.nilai=s.bp and dk.keys_kriteria = '600' ) as bp,
            (select jenis from detail_kriteria dk WHERE dk.nilai=s.kr and dk.keys_kriteria = '700' ) as kr
            FROM students s $sql ORDER BY s.hasil DESC");
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->mergeCells('A1:G1');
        $sheet->getStyle('A1')->getAlignment()->applyFromArray(
            array('horizontal' => Alignment::HORIZONTAL_CENTER,)
        );
        $sheet->mergeCells('A2:G2');
        $sheet->getStyle('A2')->getAlignment()->applyFromArray(
            array('horizontal' => Alignment::HORIZONTAL_CENTER,)
        );
        foreach (range('A1', 'I1') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }
        $spreadsheet->getActiveSheet()->getStyle('A3:I3')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('d5d5d5');
        $sheet->setCellValue(
            'A1',
            'LAPORAN PERHITUNGAN'
        );
        $sheet->setCellValue(
            'A2',
            ' Laporan PADA TANGGAL ' . now() . ''
        );

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A3', 'Nama Lengkap');
        $sheet->setCellValue('B3', 'Pendapatan Rumah Tangga');
        $sheet->setCellValue('C3', 'Jumlah Anggota Keluarga');
        $sheet->setCellValue('D3', 'Usia');
        $sheet->setCellValue('E3', 'Status Sosial');
        $sheet->setCellValue('F3', 'Kondisi Kesehatan');
        $sheet->setCellValue('G3', 'Bobot Pekerjaan');
        $sheet->setCellValue('H3', 'Kondisi Rumah');
        $sheet->setCellValue('I3', 'Hasil');
        $rows = 4;
        // dd($data);
        foreach ($data as $pemDetails) {
            $sheet->setCellValue('A' . $rows, $pemDetails->full_name);
            $sheet->setCellValue('B' . $rows, $pemDetails->prt);
            $sheet->setCellValue('C' . $rows, $pemDetails->jak);
            $sheet->setCellValue('D' . $rows,  $pemDetails->usia);
            $sheet->setCellValue('E' . $rows,  $pemDetails->ss);
            $sheet->setCellValue('F' . $rows, $pemDetails->kk);
            $sheet->setCellValue('G' . $rows, $pemDetails->bp);
            $sheet->setCellValue('H' . $rows, $pemDetails->kr);
            $sheet->setCellValue('I' . $rows, $pemDetails->hasil);
            $rows++;
        }
        $Sheet = $spreadsheet->getActiveSheet();
        $lABC1 = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        $lABC2 = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

        for ($I = 0; $I < count($lABC1); $I++) :
            $Sheet->getColumnDimension($lABC1[$I])->setAutoSize(true);
            for ($J = 0; $J < 6; $J++) {
                $Sheet->getColumnDimension($lABC2[$J] . $lABC1[$I])->setAutoSize(true);
            }
        endfor;
        $fileName = rand(0000, 9999);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan ' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        // $writer->save('php://output');


        ob_start();
        $writer->save(public_path('storage/excel/' . $fileName . '.xlsx'));
        ob_end_clean();

        $response =  array(
            'op' => 'ok',
            'file' => '' . $fileName . '.xlsx'
        );
        // dd(response());
        die(json_encode($response));
    }
}
