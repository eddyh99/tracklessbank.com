<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operations extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url());
        }
    }

    public function topup()
    {
        $data = array(
            "title"     => "TracklessBank - Topup",
            "content"   => "admin/operations/topup",
            "mn_op"     => "active",
        );

        $this->load->view('admin_template/wrapper2', $data);
    }
}