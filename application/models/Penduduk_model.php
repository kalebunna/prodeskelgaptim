<?php
class Penduduk_model extends CI_Model 
{
    public function inset_data_excel($data)
    {
        $this->db->trans_start();
        $this->db->insert_batch("penduduk",$data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
}
