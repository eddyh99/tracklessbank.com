<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cost extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('user_id'))) {
			redirect(base_url());
		}
	}

	public function wcost()
	{
		$data = array(
			"title"     => "TracklessBank - Wise Cost",
			"content"   => "admin/cost/wcost",
			"mn_wcost"    => "active",
			"extra"     => "admin/cost/js/js_cost",
			"currency"  => apitrackless("https://api.tracklessbank.com/v1/trackless/currency/getAllCurrency")->message,
		);

		$this->load->view('admin_template/wrapper', $data);
	}

	public function dcost()
	{
		$data = array(
			"title"     => "TracklessBank - Wise Cost",
			"content"   => "admin/cost/dcost",
			"mn_dcost"    => "active",
			"extra"     => "admin/cost/js/js_cost",
			"currency"  => apitrackless("https://api.tracklessbank.com/v1/trackless/currency/getAllCurrency")->message,
			"bank"  => apitrackless("https://api.tracklessbank.com/v1/trackless/member/getAll_bank")->message,
		);

		$this->load->view('admin_template/wrapper', $data);
	}

	public function editdcost()
	{
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required');
		$this->form_validation->set_rules('bank', 'Bank', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', validation_errors());
			redirect(base_url() . "m3rc4n73/cost/dcost");
			return;
		}

		$input = $this->input;

		$curr = $this->security->xss_clean($input->post("currency"));
		$bank = $this->security->xss_clean($input->post("bank"));

		$url = apitrackless("https://api.tracklessbank.com/v1/trackless/cost/getCost?currency=" . $curr . "&bank_id=" . $bank);

		$mdata = array();
		if (@$url->code == 200) {
			$mdata = array(
				"topup" 				=> number_format($url->message->topup, 2, ".", ","),
				"wallet_sender" 		=> number_format($url->message->wallet_sender, 2, ".", ","),
				"wallet_receiver" 		=> number_format($url->message->wallet_receiver, 2, ".", ","),
				"walletbank_circuit" 	=> number_format($url->message->walletbank_circuit, 2, ".", ","),
				"walletbank_outside" 	=> number_format($url->message->walletbank_outside, 2, ".", ","),
				"swap" 					=> number_format($url->message->swap, 2, ".", ",")
			);
		} else {
			$mdata = array(
				"topup" 				=> number_format(0, 2, ".", ","),
				"wallet_sender" 		=> number_format(0, 2, ".", ","),
				"wallet_receiver" 		=> number_format(0, 2, ".", ","),
				"walletbank_circuit" 	=> number_format(0, 2, ".", ","),
				"walletbank_outside" 	=> number_format(0, 2, ".", ","),
				"swap" 					=> number_format(0, 2, ".", ",")
			);
		}

		$data = array(
			"title"     => "TracklessBank - Wise Cost",
			"content"   => "admin/cost/dcost-edit",
			"mn_dcost"  => "active",
			"extra"     => "admin/js/js_btn_disabled",
			"currency"  => apitrackless("https://api.tracklessbank.com/v1/trackless/currency/getAllCurrency")->message,
			"banks" 		=> apitrackless("https://api.tracklessbank.com/v1/trackless/member/getAll_bank")->message,
			"dcost"  	=> $mdata,
			"curr"		=> $curr,
			"bank"		=> $bank,
		);

		$this->load->view('admin_template/wrapper', $data);
	}

	public function editdcost_prosses()
	{

		$this->form_validation->set_rules('currency', 'Currency', 'trim|required');
		$this->form_validation->set_rules('bank', 'Bank', 'trim|required');
		$this->form_validation->set_rules('topup', 'Topup', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('wallet_sender', 'Wallet sender', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('wallet_receiver', 'Wallet receiver', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('walletbank_circuit', 'Walletbank circuit', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('walletbank_outside', 'Walletbank outside', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('swap', 'Swap', 'trim|required|greater_than[0]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', validation_errors());
			redirect(base_url() . "m3rc4n73/cost/dcost");
			return;
		}

		$input = $this->input;

		$curr = $this->security->xss_clean($input->post("currency"));
		$bank = $this->security->xss_clean($input->post("bank"));
		$topup = $this->security->xss_clean($input->post("topup"));
		$wallet_sender = $this->security->xss_clean($input->post("wallet_sender"));
		$wallet_receiver = $this->security->xss_clean($input->post("wallet_receiver"));
		$walletbank_circuit = $this->security->xss_clean($input->post("walletbank_circuit"));
		$walletbank_outside = $this->security->xss_clean($input->post("walletbank_outside"));
		$swap = $this->security->xss_clean($input->post("swap"));

		$dataUpdate = array(
			"topup" 				=> number_format($topup, 2, ".", ","),
			"wallet_sender" 		=> number_format($wallet_sender, 2, ".", ","),
			"wallet_receiver" 		=> number_format($wallet_receiver, 2, ".", ","),
			"walletbank_circuit" 	=> number_format($walletbank_circuit, 2, ".", ","),
			"walletbank_outside" 	=> number_format($walletbank_outside, 2, ".", ","),
			"swap" 					=> number_format($swap, 2, ".", ","),
			"currency" 				=> $curr,
			"bank_id" 				=> $bank,
		);

		$result = apitrackless("https://api.tracklessbank.com/v1/trackless/cost/setBankcost", json_encode($dataUpdate));

		if (@$result->code != 200) {
			$this->session->set_flashdata("failed", $result->message);
			redirect("m3rc4n73/cost/dcost");
		} else {
			$this->session->set_flashdata("success", "Default Cost Already Set");
			redirect("m3rc4n73/cost/dcost");
		}
	}

	public function getwcost()
	{
		$currency		= $this->security->xss_clean($_GET["currency"]);

		$mfee = apitrackless("https://api.tracklessbank.com/v1/trackless/cost/getWiseCost?currency=" . $currency);

		$mdata = array();
		if (@$mfee->code == 200) {
			$mdata = array(
				"circuit"	=> number_format($mfee->message->circuit, 2, ".", ","),
				"outside"	=> number_format($mfee->message->outside, 2, ".", ","),
			);
		} else {
			$mdata = array(
				"circuit"	=> number_format(0, 2, ".", ","),
				"outside"	=> number_format(0, 2, ".", ","),
			);
		}
		echo json_encode($mdata);
	}

	public function getdcost()
	{
		$currency		= $this->security->xss_clean($_GET["currency"]);
		$bank		= $this->security->xss_clean($_GET["bank"]);
		$mfee = apitrackless("https://api.tracklessbank.com/v1/trackless/cost/getCost?currency=" . $currency . "&bank_id=" . $bank);

		$mdata = array();
		if (@$mfee->code == 200) {
			$mdata = array(
				"topup" 				=> number_format($mfee->message->topup, 2, ".", ","),
				"wallet_sender" 		=> number_format($mfee->message->wallet_sender, 2, ".", ","),
				"wallet_receiver" 		=> number_format($mfee->message->wallet_receiver, 2, ".", ","),
				"walletbank_circuit" 	=> number_format($mfee->message->walletbank_circuit, 2, ".", ","),
				"walletbank_outside" 	=> number_format($mfee->message->walletbank_outside, 2, ".", ","),
				"swap" 					=> number_format($mfee->message->swap, 2, ".", ",")
			);
		} else {
			$mdata = array(
				"topup" 				=> number_format(0, 2, ".", ","),
				"wallet_sender" 		=> number_format(0, 2, ".", ","),
				"wallet_receiver" 		=> number_format(0, 2, ".", ","),
				"walletbank_circuit" 	=> number_format(0, 2, ".", ","),
				"walletbank_outside" 	=> number_format(0, 2, ".", ","),
				"swap" 					=> number_format(0, 2, ".", ",")
			);
		}
		echo json_encode($mdata);
	}
}