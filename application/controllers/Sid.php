<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Sid extends CI_Controller
{
    public function index()
    {
        $data = [
            "content" => "Sid",
            "page" => "Export Data Untuk Aplikasi SID"
        ];
        $this->load->view("templates/index", $data);
    }

    public function export_data_penduduk()
    {
        $spreadsheet = new Spreadsheet();
        $alpha = "A";
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue($alpha++ . '1', 'Alamat')
            ->setCellValue($alpha++ . '1', 'DUSUN')
            ->setCellValue($alpha++ . '1', 'RW')
            ->setCellValue($alpha++ . '1', 'RT')
            ->setCellValue($alpha++ . '1', 'Nama Lengkap')
            ->setCellValue($alpha++ . '1', 'NO_KK')
            ->setCellValue($alpha++ . '1', 'NIK')
            ->setCellValue($alpha++ . '1', 'Jenis Kelamin')
            ->setCellValue($alpha++ . '1', 'Tempat Lahir')
            ->setCellValue($alpha++ . '1', 'Tanggal Lahir')
            ->setCellValue($alpha++ . '1', 'Agama')
            ->setCellValue($alpha++ . '1', 'Pendidikan Dalam KK')
            ->setCellValue($alpha++ . '1', 'Pendidikan Sedang Ditempuh')
            ->setCellValue($alpha++ . '1', 'Pekerjaan')
            ->setCellValue($alpha++ . '1', 'Status Perkawinan')
            ->setCellValue($alpha++ . '1', 'Status Hubungan Dalam Keluarga')
            ->setCellValue($alpha++ . '1', 'Kewarganegaraan')
            ->setCellValue($alpha++ . '1', 'Nama Ayah')
            ->setCellValue($alpha++ . '1', 'Nama Ibu')
            ->setCellValue($alpha++ . '1', 'Golongan Darah')
            ->setCellValue($alpha++ . '1', 'Akta Lahir')
            ->setCellValue($alpha++ . '1', 'Nomor Dokumen Pasport')
            ->setCellValue($alpha++ . '1', 'Tanggal Akhir Pasport')
            ->setCellValue($alpha++ . '1', 'Nomor Dokumen KITAS')
            ->setCellValue($alpha++ . '1', 'NIK Ayah')
            ->setCellValue($alpha++ . '1', 'NIK Ibu')
            ->setCellValue($alpha++ . '1', 'Nomor Akta Perkawinan')
            ->setCellValue($alpha++ . '1', 'Tanggal Perkawinan')
            ->setCellValue($alpha++ . '1', 'Nomor Akta Perceraian')
            ->setCellValue($alpha++ . '1', 'Tanggal Perceraian')
            ->setCellValue($alpha++ . '1', 'Cacat')
            ->setCellValue($alpha++ . '1', 'Cara KB')
            ->setCellValue($alpha++ . '1', 'Hamil')
            ->setCellValue($alpha++ . '1', 'KTP EL')
            ->setCellValue($alpha++ . '1', 'Status Rekam');

        $data_penduduk = $this->data_penduduk_for_export();
        $alpha = "A";
        $no = 2;
        foreach ($data_penduduk as $pnd) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue($alpha++ . $no, "RT " . $pnd["rt"] . " RW " . $pnd["rw"] . " DUSUN " . $pnd["dusun"])
                ->setCellValue($alpha++  . $no, $pnd["dusun"])
                ->setCellValue($alpha++  . $no, $pnd["rw"])
                ->setCellValue($alpha++  . $no, $pnd["rt"])
                ->setCellValue($alpha++  . $no, $pnd["nama"])
                ->setCellValue($alpha++  . $no, $pnd["kk"])
                ->setCellValue($alpha++  . $no, $pnd["nik"])
                ->setCellValue($alpha++  . $no, $pnd["jenis_kelamin"])
                ->setCellValue($alpha++  . $no, $pnd["tempat_lahir"])
                ->setCellValue($alpha++  . $no, $pnd["tanggal_lahir"])
                ->setCellValue($alpha++  . $no,  $pnd["agama"])
                ->setCellValue($alpha++  . $no, $pnd["pendidikan"])
                ->setCellValue($alpha++  . $no, "")
                ->setCellValue($alpha++  . $no, $pnd["pekerjaan"])
                ->setCellValue($alpha++  . $no, $pnd["status"])
                ->setCellValue($alpha++  . $no, $pnd["status_kel"])
                ->setCellValue($alpha++  . $no, '1')
                ->setCellValue($alpha++  . $no, $pnd["ayah"])
                ->setCellValue($alpha++  . $no, $pnd["ibu"])
                ->setCellValue($alpha++  . $no, '')
                ->setCellValue($alpha++  . $no, $pnd["akta"])
                ->setCellValue($alpha++  . $no, '')
                ->setCellValue($alpha++  . $no, '')
                ->setCellValue($alpha++  . $no, '')
                ->setCellValue($alpha++  . $no, $pnd["nik_ayah"])
                ->setCellValue($alpha++  . $no,  $pnd["nik_ibu"])
                ->setCellValue($alpha++  . $no, '')
                ->setCellValue($alpha++  . $no, '')
                ->setCellValue($alpha++  . $no, '')
                ->setCellValue($alpha++  . $no, '')
                ->setCellValue($alpha++  . $no, '')
                ->setCellValue($alpha++  . $no, '')
                ->setCellValue($alpha++  . $no, '')
                ->setCellValue($alpha++  . $no, '')
                ->setCellValue($alpha++  . $no, $pnd["status_rekam"]);
            $no++;
            $alpha = "A";
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Latihan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function data_penduduk_for_export()
    {

        $data_akhir = array();
        $this->db->select("*,2022-YEAR(penduduk.TGL_LHR) as umur");
        $penduduk = $this->db->get("penduduk")->result_array();
        foreach ($penduduk as $key) {

            $temp_data = [
                "nama" => $key["NAMA_LENGKAP"],
                "jenis_kelamin" => $this->jenis_kelamin($key["JK"]),
                "pendidikan" => $this->pendidikan_dalam_kk($key["DIDIK"]),
                "agama" => $this->agama($key["AGAMA"]),
                "rt" => $key["RT"],
                "rw" => $key["RW"],
                "kk" => $key["NO_KK"],
                "nik" => $key["NIK"],
                "tempat_lahir" => $key["TMP_LHR"],
                "tanggal_lahir" => date('d-m-Y', strtotime($key["TGL_LHR"])),
                "pekerjaan" => $this->pekerjaan($key["KERJA"]),
                "status" => $this->status_perkawinan($key["STATUS"]),
                "status_kel" => $this->status_hubungan($key["SHDK"]),
                "ayah" => $key["AYAH"],
                "ibu" => $key["IBU"],
                "nik_ayah" => $this->cari_nik_ayah($key["NIK"]),
                "nik_ibu" => $this->cari_nik_ibu($key["NIK"]),
                "akta" => $key["NO_AKTA"],
                "dusun" => $key["ALAMAT"],
                "status_rekam" => $key["umur"] < 17 ? "1" : "3"
            ];
            array_push($data_akhir, $temp_data);
        }

        return $data_akhir;
    }

    public function jenis_kelamin($jenis)
    {
        if ($jenis == "LK") {
            return 1;
        } else {
            return 2;
        }
    }

    public function pendidikan_dalam_kk($data)
    {
        $temp_nilai = 0;
        switch ($data) {
            case 'TDK/BLM SEKOLAH':
                $temp_nilai = 1;
                break;
            case 'TDK TMT SD/SEDERAJAT':
                $temp_nilai = 2;
                break;

            case 'TAMAT SD/SEDERAJAT':
                $temp_nilai = 3;
                break;
            case 'SLTP/SEDERAJAT':
                $temp_nilai = 4;
                break;
            case 'SLTA/SEDERAJAT':
                $temp_nilai = 5;
                break;
            case 'DIPL I/II':
                $temp_nilai = 6;
                break;
            case 'AKADEMI/DIPL III/S.':
                $temp_nilai = 7;
                break;
            case 'DIPL IV/STRATA I':
                $temp_nilai = 8;
                break;
            case 'STRATA II':
                $temp_nilai = 9;
                break;
            case 'STRATA III':
                $temp_nilai = 10;
                break;
        }
        return $temp_nilai;
    }

    public function agama($data)
    {

        $agama = array(
            "1" => "ISLAM",
            "2" => "KRISTEN",
            "3" => "KATHOLIK",
            "4" => "HINDU",
            "5" => "BUDHA",
            "6" => "KHONGHUCU"
        );
        $temp_nilai = array_search($data, $agama, false);
        if ($temp_nilai) {
            return $temp_nilai;
        } else {
            return "7";
        }
    }

    public function pekerjaan($data)
    {

        $pekerjaan = array(
            "1"    =>    "BLM/TIDAK BEKERJA",
            "2"    =>    "MENGRUS RMH TANGGA",
            "3"    =>    "PELAJAR/MAHASISWA",
            "4"    =>    "PENSIUNAN",
            "5"    =>    "PEGAWAI NEGERI SIPIL",
            "6"    =>    "TENTARA NASIONAL INDONESIA (TNI)",
            "7"    =>    "KEPOLISIAN RI (POLRI)",
            "8"    =>    "PERDAGANGAN",
            "9"    =>    "PETANI/PEKEBUN",
            "10"    =>    "PETERNAK",
            "11"    =>    "NELAYAN/PERIKANAN",
            "12"    =>    "INDUSTRI",
            "13"    =>    "KONSTRUKSI",
            "14"    =>    "TRANSPORTASI",
            "15"    =>    "KARYAWAN SWASTA",
            "16"    =>    "KARYAWAN BUMN",
            "17"    =>    "KARYAWAN BUMD",
            "18"    =>    "KARYAWAN HONORER",
            "19"    =>    "BURUH HARIAN LEPAS",
            "20"    =>    "BURUH TANI/PERKEBUNAN",
            "21"    =>    "BURUH NELAYAN/PERIKANAN",
            "22"    =>    "BURUH PETERNAKAN",
            "23"    =>    "PEMBANTU RUMAH TANGGA",
            "24"    =>    "TUKANG CUKUR",
            "25"    =>    "TUKANG LISTRIK",
            "26"    =>    "TUKANG BATU",
            "27"    =>    "TUKANG KAYU",
            "28"    =>    "TUKANG SOL SEPATU",
            "29"    =>    "TUKANG LAS/PANDAI BESI",
            "30"    =>    "TUKANG JAHIT",
            "31"    =>    "TUKANG GIGI",
            "32"    =>    "PENATA RIAS",
            "33"    =>    "PENATA BUSANA",
            "34"    =>    "PENATA RAMBUT",
            "35"    =>    "MEKANIK",
            "36"    =>    "SENIMAN",
            "37"    =>    "TABIB",
            "38"    =>    "PARAJI",
            "39"    =>    "PERANCANG BUSANA",
            "40"    =>    "PENTERJEMAH",
            "41"    =>    "IMAM MASJID",
            "42"    =>    "PENDETA",
            "43"    =>    "PASTOR",
            "44"    =>    "WARTAWAN",
            "45"    =>    "USTADZ/MUBALIGH",
            "46"    =>    "JURU MASAK",
            "47"    =>    "PROMOTOR ACARA",
            "48"    =>    "ANGGOTA DPR-RI",
            "49"    =>    "ANGGOTA DPD",
            "50"    =>    "ANGGOTA BPK",
            "51"    =>    "PRESIDEN",
            "52"    =>    "WAKIL PRESIDEN",
            "53"    =>    "ANGGOTA MAHKAMAH KONSTITUSI",
            "54"    =>    "ANGGOTA KABINET KEMENTERIAN",
            "55"    =>    "DUTA BESAR",
            "56"    =>    "GUBERNUR",
            "57"    =>    "WAKIL GUBERNUR",
            "58"    =>    "BUPATI",
            "59"    =>    "WAKIL BUPATI",
            "60"    =>    "WALIKOTA",
            "61"    =>    "WAKIL WALIKOTA",
            "62"    =>    "ANGGOTA DPRD PROVINSI",
            "63"    =>    "ANGGOTA DPRD KABUPATEN/KOTA",
            "64"    =>    "DOSEN",
            "65"    =>    "GURU",
            "66"    =>    "PILOT",
            "67"    =>    "PENGACARA",
            "68"    =>    "NOTARIS",
            "69"    =>    "ARSITEK",
            "70"    =>    "AKUNTAN",
            "71"    =>    "KONSULTAN",
            "72"    =>    "DOKTER",
            "73"    =>    "BIDAN",
            "74"    =>    "PERAWAT",
            "75"    =>    "APOTEKER",
            "76"    =>    "PSIKIATER/PSIKOLOG",
            "77"    =>    "PENYIAR TELEVISI",
            "78"    =>    "PENYIAR RADIO",
            "79"    =>    "PELAUT",
            "80"    =>    "PENELITI",
            "81"    =>    "SOPIR",
            "82"    =>    "PIALANG",
            "83"    =>    "PARANORMAL",
            "84"    =>    "PEDAGANG",
            "85"    =>    "PERANGKAT DESA",
            "86"    =>    "KEPALA DESA",
            "87"    =>    "BIARAWATI",
            "88"    =>    "WIRASWASTA",
        );
        $temp_nilai = array_search($data, $pekerjaan, false);
        return $temp_nilai;
    }

    public function status_perkawinan($data)
    {
        $perkawinan = [
            "1" => "BLM KAWIN",
            "2" => "KAWIN",
            "3" => "CERAI HIDUP",
            "4" => "CERAI MATI"
        ];
        $temp_nilai = array_search($data, $perkawinan, false);
        return $temp_nilai;
    }

    public function status_hubungan($data)
    {
        $status = [
            "1"    =>    "KEPALA KEL",
            "2"    =>    "SUAMI",
            "3"    =>    "ISTRI",
            "4"    =>    "ANAK",
            "5"    =>    "MENANTU",
            "6"    =>    "CUCU",
            "7"    =>    "ORANG TUA",
            "8"    =>    "MERTUA",
            "9"    =>    "FAMILI LAI",
            "10"    =>    "PEMBANTU",
            "11"    =>    "LAINNYA",
        ];
        $temp_nilai = array_search($data, $status, false);
        return $temp_nilai;
    }

    public function cari_nik_ayah($nik)
    {
        $this->db->select("(SELECT NIK FROM penduduk WHERE A.AYAH=penduduk.NAMA_LENGKAP AND NO_KK=A.NO_KK) AS nik_ayah ");
        $this->db->where("NIK", $nik);
        $this->db->limit(1);
        $nik_ayah = $this->db->get("penduduk A");
        if ($nik_ayah->num_rows() > 0) {
            return $nik_ayah->row()->nik_ayah;
        } else {
            return "";
        }
    }

    public function cari_nik_ibu($nik)
    {
        $this->db->select("(SELECT NIK FROM penduduk WHERE A.IBU=penduduk.NAMA_LENGKAP AND NO_KK=A.NO_KK) AS nik_ibu ");
        $this->db->where("NIK", $nik);
        $this->db->limit(1);
        $nik_ibu = $this->db->get("penduduk A");
        if ($nik_ibu->num_rows() > 0) {
            return $nik_ibu->row()->nik_ibu;
        } else {
            return "";
        }
    }
}
