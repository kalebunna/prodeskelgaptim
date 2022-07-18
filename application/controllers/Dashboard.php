<?php
class Dashboard extends CI_Controller 
{
    public function index()
    {
        $data =[
            "content"=> "dashboard"
        ];
        $this->load->view("templates/index",$data);
    }
}
