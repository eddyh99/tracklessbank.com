<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Currency extends CI_Controller
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
            "title"     => "TracklessBank - Currency",
            "content"   => "admin/currency/currency",
            "mn_currency" => "active",
            // "extra"     => "admin/mwallet/js/js_masterwallet",
        );

        $this->load->view('admin_template/wrapper', $data);
    }
}