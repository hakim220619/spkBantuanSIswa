<?php

namespace App\Imports;

use App\Models\StudentsModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class ImportStudents implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        $prt = 0;
        if ($row['pendapatan_rumah_tangga'] <= 50) {
            $prt = 0.5;
        } elseif (in_array($row['pendapatan_rumah_tangga'], range(50, 60))) {
            $prt = 0.6;
        } elseif (in_array($row['pendapatan_rumah_tangga'], range(60, 70))) {
            $prt = 0.7;
        } elseif (in_array($row['pendapatan_rumah_tangga'], range(70, 80))) {
            $prt = 0.8;
        } elseif (in_array($row['pendapatan_rumah_tangga'], range(80, 90))) {
            $prt = 0.9;
        } elseif (in_array($row['pendapatan_rumah_tangga'], range(90, 100))) {
            $prt = 1;
        }

        $jak = 0;
        if ($row['jumlah_anggota_keluarga'] <= 50) {
            $jak = 0.5;
        } elseif (in_array($row['jumlah_anggota_keluarga'], range(50, 60))) {
            $jak = 0.6;
        } elseif (in_array($row['jumlah_anggota_keluarga'], range(60, 70))) {
            $jak = 0.7;
        } elseif (in_array($row['jumlah_anggota_keluarga'], range(70, 80))) {
            $jak = 0.8;
        } elseif (in_array($row['jumlah_anggota_keluarga'], range(80, 90))) {
            $jak = 0.9;
        } elseif (in_array($row['jumlah_anggota_keluarga'], range(90, 100))) {
            $jak = 1;
        }

        $usia = 0;
        if ($row['usia'] <= 50) {
            $usia = 0.5;
        } elseif (in_array($row['usia'], range(50, 60))) {
            $usia = 0.6;
        } elseif (in_array($row['usia'], range(60, 70))) {
            $usia = 0.7;
        } elseif (in_array($row['usia'], range(70, 80))) {
            $usia = 0.8;
        } elseif (in_array($row['usia'], range(80, 90))) {
            $usia = 0.9;
        } elseif (in_array($row['usia'], range(90, 100))) {
            $usia = 1;
        }
        

       

        $ss = 0;
        if ($row['status_sosial'] <= 60) {
            $ss = 0.6;
        } elseif (in_array($row['status_sosial'], range(60, 70))) {
            $ss = 0.6;
        } elseif (in_array($row['status_sosial'], range(70, 80))) {
            $ss = 0.7;
        } elseif (in_array($row['status_sosial'], range(80, 90))) {
            $ss = 0.8;
        } elseif (in_array($row['status_sosial'], range(90, 100))) {
            $ss = 0.9;
        } 


       


        $kk = 0;
        if ($row['kondisi_kesehatan'] <= 60) {
            $kk = 0.6;
        } elseif (in_array($row['kondisi_kesehatan'], range(60, 80))) {
            $kk = 0.8;
        } elseif (in_array($row['kondisi_kesehatan'], range(80, 100))) {
            $kk = 1;
        } 

        $bp = 0;
        if ($row['bobot_pekerjaan'] <= 60) {
            $bp = 0.6;
        } elseif (in_array($row['bobot_pekerjaan'], range(60, 70))) {
            $bp = 0.6;
        } elseif (in_array($row['bobot_pekerjaan'], range(70, 80))) {
            $bp = 0.7;
        } elseif (in_array($row['bobot_pekerjaan'], range(80, 90))) {
            $bp = 0.8;
        } elseif (in_array($row['bobot_pekerjaan'], range(90, 100))) {
            $bp = 0.9;
        } 

        $kr = 0;
        if ($row['kondisi_rumah'] <= 60) {
            $kr = 0.6;
        } elseif (in_array($row['kondisi_rumah'], range(60, 80))) {
            $kr = 0.8;
        } elseif (in_array($row['kondisi_rumah'], range(80, 100))) {
            $kr = 1;
        } 


        $hasil = 0;
        return new StudentsModel([
            // dd($nis),
            'nis' => $row['nis'],
            'full_name' => $row['full_name'],
            'prt' => $prt,
            'jak' => $jak,
            'usia' => $usia,
            'ss' => $ss,
            'kk' => $kk,
            'bp' => $bp,
            'kr' => $kr,
            'hasil' => $hasil,
        ]);
    }
}
