<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Penduduk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('Penduduk_model');
    }
    public function index()
    {
        $data = [
            "page" => "Penduduk",
            "content" => "penduduk"
        ];

        $this->load->view("templates/index", $data);
    }

    public function add_data()
    {
        $path_xlsx = $_FILES["fileExcel"]["tmp_name"];
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($path_xlsx);
        $d = $spreadsheet->getSheet(0)->toArray();
        unset($d[0]);
        $datas = array();
        foreach ($d as $t) {
            // pengecekan jika data diinputkan sudah kosong maka perulangan berhenti
            $data_input["NO_KK"] = $t[0];
            $data_input["NIK"] = $t[1];
            $data_input["NAMA_LENGKAP"] = $t[2];
            $data_input["TGL_LHR"] = date("Y-m-d", strtotime($t[3]));;
            $data_input["NO_AKTA"] = $t[4];
            $data_input["KODE_KEL"] = $t[5];
            $data_input["KODE_KEC"] = $t[6];
            $data_input["JK"] = $t[7];
            $data_input["TMP_LHR"] = $t[8];;
            $data_input["SHDK"] = $t[9];
            $data_input["KD_SHDK"] = $t[10];
            $data_input["AYAH"] = $t[11];
            $data_input["IBU"] = $t[12];
            $data_input["NAMA_KK"] = $t[13];
            $data_input["ALAMAT"] = $t[14];
            $data_input["RT"] = $t[15];
            $data_input["RW"] = $t[16];
            $data_input["STATUS"] = $t[17];
            $data_input["AGAMA"] = $t[18];
            $data_input["DIDIK"] = $t[19];
            $data_input["KERJA"] = $t[20];
            // $data_input["KTP_EL"]=$t
            array_push($datas, $data_input);
        }
        $log_result = $this->Penduduk_model->inset_data_excel($datas);
        echo json_encode($log_result);
    }

    public function get_data()
    {
        $data = [
            "data" => $this->db->get("penduduk")->result_array()
        ];
        echo json_encode($data);
    }
}
