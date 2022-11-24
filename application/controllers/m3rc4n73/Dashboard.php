<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
            "title"     => "TracklessBank - Admin Dashboard",
            "content"   => "admin/dashboard",
            "mn_dashboard" => "active",
            "currency"  => apitrackless("https://api.tracklessbank.com/v1/trackless/wallet/getAll_Balance")->message,
        );

        $this->load->view('admin_template/wrapper', $data);
    }
}