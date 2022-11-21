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
        $url = "https://api.tracklessbank.com/v1/trackless/currency/getAllCurrency";

        $data = array(
            "title"     => "TracklessBank - Currency",
            "content"   => "admin/currency/currency",
            "mn_currency" => "active",
            "currency"     => apitrackless($url)->message,
            "extra"     => 'admin/currency/js/js_currency',
        );

        $this->load->view('admin_template/wrapper', $data);
    }

    public function setCurrency()
    {
        $currency = $_GET["currency"];
        $status = $_GET["status"];
        $url = "https://api.tracklessbank.com/v1/trackless/currency/currencyStatus?status=" . $status .  "&currency=" . $currency;
        $result = apitrackless($url);
        echo json_encode($result);
    }
}