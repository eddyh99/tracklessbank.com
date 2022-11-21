<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data = array(
            "title"     => "TracklessBank - Bank",
            "content"   => "admin/bank/bank",
            "mn_bank" => "active",
            "extra"     => "admin/bank/js/js_bank"
        );

        $this->load->view('admin_template/wrapper2', $data);
    }
}