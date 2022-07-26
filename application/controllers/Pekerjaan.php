<?php
class Pekerjaan extends CI_COntroller
{
    public function index()
    {
        $data = [
            "content" => "Pekerjaan",
            "jenis_pekerjaan" => $this->db->query("SELECT penduduk.KERJA FROM penduduk GROUP BY penduduk.KERJA ORDER BY KERJA ASC")->result()
        ];
        $this->load->view("templates/index", $data);
    }
    public function filter($kategori)
    {
        $data_pekerjaan = $this->db->query("SELECT penduduk.KERJA FROM penduduk GROUP BY penduduk.KERJA")->result();

        $temp = $data_pekerjaan[$kategori]->KERJA;
        $lk = $this->db->query('SELECT *,(2022-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE KERJA="' . $temp . '" AND JK = "LK"');
        $pr = $this->db->query('SELECT *,(2022-YEAR(penduduk.TGL_LHR)) as umur FROM penduduk WHERE KERJA="' . $temp . '" AND JK = "PR"');

        $allresult = (array_merge($lk->result_array(), $pr->result_array()));
        // array_push(;
        $data = [
            "laki" => $lk->num_rows(),
            "perem" => $pr->num_rows(),
            "data" => $allresult
        ];
        echo json_encode($data);
    }
}
