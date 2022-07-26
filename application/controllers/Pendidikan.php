<?php
class Pendidikan extends CI_Controller
{
    public function index()
    {
        $data = [
            "content" => "pendidikan"
        ];
        $this->load->view("templates/index", $data);
    }

    public function filter($kategori, $tahun)
    {
        switch ($kategori) {
            case 2:
                $lk = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (' . $tahun . '-YEAR(penduduk.TGL_LHR)) >= 3 AND (' . $tahun . '-YEAR(penduduk.TGL_LHR)) <=6 AND JK = "LK"');
                $pr = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (' . $tahun . '-YEAR(penduduk.TGL_LHR)) >= 3 AND (' . $tahun . '-YEAR(penduduk.TGL_LHR)) <=6 AND JK = "PR"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                echo json_encode($data);
                break;
            case 3:
                $lk = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (' . $tahun . '-YEAR(penduduk.TGL_LHR)) >= 7 AND (' . $tahun . '-YEAR(penduduk.TGL_LHR)) <=18 AND JK = "LK" AND DIDIK = "TDK/BLM SEKOLAH"');
                $pr = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (' . $tahun . '-YEAR(penduduk.TGL_LHR)) >= 7 AND (' . $tahun . '-YEAR(penduduk.TGL_LHR)) <=18 AND JK = "PR"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                echo json_encode($data);
                break;
            case 4:
                $lk = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (' . $tahun . '-YEAR(penduduk.TGL_LHR)) >= 7 AND (' . $tahun . '-YEAR(penduduk.TGL_LHR)) <=18 AND JK = "LK"');
                $pr = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (' . $tahun . '-YEAR(penduduk.TGL_LHR)) >= 7 AND (' . $tahun . '-YEAR(penduduk.TGL_LHR)) <=18 AND JK = "PR"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                echo json_encode($data);
                break;
            case 5:
                $lk = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (' . $tahun . '-YEAR(penduduk.TGL_LHR)) >= 18 AND (' . $tahun . '-YEAR(penduduk.TGL_LHR)) <=56 AND JK = "LK" AND DIDIK = "TDK TMT SD/SEDERAJAT"');
                $pr = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (' . $tahun . '-YEAR(penduduk.TGL_LHR)) >= 18 AND (' . $tahun . '-YEAR(penduduk.TGL_LHR)) <=56 AND JK = "PR" AND  DIDIK = "TDK TMT SD/SEDERAJAT"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                echo json_encode($data);
                break;
            case 7:
                $lk = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (' . $tahun . '-YEAR(penduduk.TGL_LHR)) >= 18 AND (' . $tahun . '-YEAR(penduduk.TGL_LHR)) <=56 AND JK = "LK" AND DIDIK = "TAMAT SD/SEDERAJAT"');
                $pr = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (' . $tahun . '-YEAR(penduduk.TGL_LHR)) >= 18 AND (' . $tahun . '-YEAR(penduduk.TGL_LHR)) <=56 AND JK = "PR" AND  DIDIK = "TAMAT SD/SEDERAJAT"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                echo json_encode($data);
                break;
            case 8:
                $lk = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (' . $tahun . '-YEAR(penduduk.TGL_LHR)) >= 18 AND (' . $tahun . '-YEAR(penduduk.TGL_LHR)) <=56 AND JK = "LK" AND DIDIK = "SLTP/SEDERAJAT"');
                $pr = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE (' . $tahun . '-YEAR(penduduk.TGL_LHR)) >= 18 AND (' . $tahun . '-YEAR(penduduk.TGL_LHR)) <=56 AND JK = "PR" AND  DIDIK = "SLTP/SEDERAJAT"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                echo json_encode($data);
                break;
            case 9:
                $lk = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "LK" AND DIDIK = "TAMAT SD/SEDERAJAT"');
                $pr = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "PR" AND DIDIK = "TAMAT SD/SEDERAJAT"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                # code...

                echo json_encode($data);
                break;
            case 10:
                $lk = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "LK" AND DIDIK = "SLTP/SEDERAJAT"');
                $pr = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "PR" AND DIDIK = "SLTP/SEDERAJAT"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                # code...

                echo json_encode($data);
                break;
            case 11:
                $lk = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "LK" AND DIDIK = "SLTA/SEDERAJAT"');
                $pr = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "PR" AND DIDIK = "SLTA/SEDERAJAT"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                # code...

                echo json_encode($data);
                break;
            case 12:
                $lk = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "LK" AND DIDIK = "DIPL I"');
                $pr = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "PR" AND DIDIK = "DIPL I/II"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                # code...

                echo json_encode($data);
                break;
            case 13:
                $lk = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "LK" AND DIDIK = "DIPL I/II"');
                $pr = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "PR" AND DIDIK = "DIPL I/II"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                # code...

                echo json_encode($data);
                break;
            case 14:
                $lk = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "LK" AND DIDIK = "AKADEMI/DIPL III/S."');
                $pr = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "PR" AND DIDIK = "AKADEMI/DIPL III/S."');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                # code...

                echo json_encode($data);
                break;
            case 15:
                $lk = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "LK" AND DIDIK = "DIPL IV/STRATA I"');
                $pr = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "PR" AND DIDIK = "DIPL IV/STRATA I"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                # code...

                echo json_encode($data);
                break;
            case 16:
                $lk = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "LK" AND DIDIK = "STRATA II"');
                $pr = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "PR" AND DIDIK = "STRATA II"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                # code...

                echo json_encode($data);
                break;
            case 17:
                $lk = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "LK" AND DIDIK = "STRATA III"');
                $pr = $this->db->query('SELECT *,(' . $tahun . '-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE JK = "PR" AND DIDIK = "STRATA III"');
                $allresult = (array_merge($lk->result_array(), $pr->result_array()));
                // array_push(;
                $data = [
                    "laki" => $lk->num_rows(),
                    "perem" => $pr->num_rows(),
                    "data" => $allresult
                ];
                # code...

                echo json_encode($data);
                break;
            default:
                # code...
                break;
        }
    }
}
