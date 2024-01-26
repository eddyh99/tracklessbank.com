<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
	    $banks=URLAPI . "/v1/member/wallet/getAllbank";
		$data = array(
			'title'     => 'Trackless Bank',
			'content'   => 'home/index',
			'banks'      => apitrackless($banks)->message,
			'extra'     => 'home/js/js_index',
		);
		
		$this->load->view('layout/wrapper', $data);
    }
}