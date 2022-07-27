<?php
class Angkatan_kerja extends CI_Controller
{
    public function index()
    {
        $data = [
            "content" => "Angkata_kerja"
        ];
        $this->load->view("templates/index", $data);
    }

    public function filter($kategori)
    {
        switch ($kategori) {
            case '0':
                $lk = $this->db->query('SELECT *,(2022-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (2022-YEAR(penduduk.TGL_LHR)) >= 18 AND (2022-YEAR(penduduk.TGL_LHR)) <=56 AND JK = "LK" AND KERJA ="BLM/TIDAK BEKERJA"');
                $pr = $this->db->query('SELECT *,(2022-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (2022-YEAR(penduduk.TGL_LHR)) >= 18 AND (2022-YEAR(penduduk.TGL_LHR)) <=56 AND JK = "PR" AND KERJA = "BLM/TIDAK BEKERJA"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                echo json_encode($data);
                break;
            case '1':
                $lk = $this->db->query('SELECT *,(2022-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (2022-YEAR(penduduk.TGL_LHR)) >= 18 AND (2022-YEAR(penduduk.TGL_LHR)) <=56 AND JK = "LK" AND KERJA !="BLM/TIDAK BEKERJA" AND KERJA !="PELAJAR/MAHASISWA"');
                $pr = $this->db->query('SELECT *,(2022-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (2022-YEAR(penduduk.TGL_LHR)) >= 18 AND (2022-YEAR(penduduk.TGL_LHR)) <=56 AND JK = "PR" AND KERJA != "BLM/TIDAK BEKERJA" AND KERJA != "PELAJAR/MAHASISWA"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                echo json_encode($data);
                break;
            case '2':
                $lk = $this->db->query('SELECT *,(2022-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (2022-YEAR(penduduk.TGL_LHR)) >= 15 AND (2022-YEAR(penduduk.TGL_LHR)) <=65 AND JK = "LK"  AND KERJA ="BLM/TIDAK BEKERJA"');
                $pr = $this->db->query('SELECT *,(2022-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (2022-YEAR(penduduk.TGL_LHR)) >= 15 AND (2022-YEAR(penduduk.TGL_LHR)) <=65 AND JK = "PR"  AND KERJA ="BLM/TIDAK BEKERJA"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                echo json_encode($data);
                break;
            case '3':
                $lk = $this->db->query('SELECT *,(2022-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (2022-YEAR(penduduk.TGL_LHR)) >= 57 AND JK = "LK"');
                $pr = $this->db->query('SELECT *,(2022-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (2022-YEAR(penduduk.TGL_LHR)) >= 57 AND JK = "PR"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                echo json_encode($data);
                break;
            case '4':
                $lk = $this->db->query('SELECT *,(2022-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (2022-YEAR(penduduk.TGL_LHR)) >= 0 AND (2022-YEAR(penduduk.TGL_LHR)) <= 6 AND JK = "LK"');
                $pr = $this->db->query('SELECT *,(2022-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (2022-YEAR(penduduk.TGL_LHR)) >= 0 AND (2022-YEAR(penduduk.TGL_LHR)) <= 6 AND JK = "PR"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                echo json_encode($data);
                break;
            case '5':
                $lk = $this->db->query('SELECT *,(2022-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (2022-YEAR(penduduk.TGL_LHR)) >= 18 AND (2022-YEAR(penduduk.TGL_LHR)) <= 56 AND JK = "LK"');
                $pr = $this->db->query('SELECT *,(2022-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (2022-YEAR(penduduk.TGL_LHR)) >= 18 AND (2022-YEAR(penduduk.TGL_LHR)) <= 56 AND JK = "PR"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                echo json_encode($data);
                break;
        }
    }
}
