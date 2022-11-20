<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fee extends CI_Controller
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
			"title"     => "TracklessBank - Default Fee",
			"content"   => "admin/fee/fee",
			"mn_fee"    => "active",
			"extra"     => "admin/fee/js/js_fee",
			"currency"  => apitrackless("https://api.tracklessbank.com/v1/admin/currency/getAllCurrency")->message,
		);

		$this->load->view('admin_template/wrapper', $data);
	}

	public function getfee()
	{
		$currency		= $this->security->xss_clean($_GET["currency"]);

		$mfee = apitrackless("https://api.tracklessbank.com/v1/admin/fee/getFee?currency=" . $currency);

		$mdata = array();
		if (@$mfee->code == 200) {
			$mdata = array(
				"topup"                 => number_format($mfee->message->topup, 2, ".", ","),
				"walletbank_local"      => number_format($mfee->message->walletbank_circuit, 2, ".", ","),
				"walletbank_inter"      => number_format($mfee->message->walletbank_outside, 2, ".", ","),
				"wallet2wallet_send"    => number_format($mfee->message->wallet_sender, 2, ".", ","),
				"wallet2wallet_receive" => number_format($mfee->message->wallet_receiver, 2, ".", ","),
				"ref_send"              => number_format($mfee->message->referral_send, 2, ".", ","),
				"ref_receive"           => number_format($mfee->message->referral_receive, 2, ".", ","),
				"swap"                  => number_format($mfee->message->swap, 2, ".", ","),
			);
		} else {
			$mdata = array(
				"topup"                 => number_format(0, 2, ".", ","),
				"walletbank_local"      => number_format(0, 2, ".", ","),
				"walletbank_inter"      => number_format(0, 2, ".", ","),
				"wallet2wallet_send"    => number_format(0, 2, ".", ","),
				"wallet2wallet_receive" => number_format(0, 2, ".", ","),
				"ref_send"              => number_format(0, 2, ".", ","),
				"ref_receive"           => number_format(0, 2, ".", ","),
				"swap"                  => number_format(0, 2, ".", ","),
			);
		}
		echo json_encode($mdata);
	}

	public function editfee($currency)
	{
		$mfee = apitrackless("https://api.tracklessbank.com/v1/admin/fee/getFee?currency=" . $currency);

		$mdata = array();
		if (@$mfee->code == 200) {
			$mdata = array(
				"topup"             => number_format($mfee->message->topup, 2, ".", ","),
				"walletbank_local"  => number_format($mfee->message->walletbank_circuit, 2, ".", ","),
				"walletbank_inter"  => number_format($mfee->message->walletbank_outside, 2, ".", ","),
				"wallet2wallet_send"    => number_format($mfee->message->wallet_sender, 2, ".", ","),
				"wallet2wallet_receive" => number_format($mfee->message->wallet_receiver, 2, ".", ","),
				"ref_send"          => number_format($mfee->message->referral_send, 2, ".", ","),
				"ref_receive"       => number_format($mfee->message->referral_receive, 2, ".", ","),
				"swap"              => number_format($mfee->message->swap, 2, ".", ","),
			);
		} else {
			$mdata = array(
				"topup"                 => number_format(0, 2, ".", ","),
				"walletbank_local"      => number_format(0, 2, ".", ","),
				"walletbank_inter"      => number_format(0, 2, ".", ","),
				"wallet2wallet_send"    => number_format(0, 2, ".", ","),
				"wallet2wallet_receive" => number_format(0, 2, ".", ","),
				"ref_send"              => number_format(0, 2, ".", ","),
				"ref_receive"           => number_format(0, 2, ".", ","),
				"swap"                  => number_format(0, 2, ".", ","),
			);
		}

		$data = array(
			"title"     => "TracklessBank - Edit Default Fee",
			"content"   => "admin/fee/editfee",
			"mn_fee"    => "active",
			"fee"       => $mdata,
			"currency"  => $currency
		);

		$this->load->view('admin_template/wrapper', $data);
	}

	public function updatefee()
	{
		$this->form_validation->set_rules('topup', 'Topup', 'trim|required|greater_than[0]|decimal');
		$this->form_validation->set_rules('walletbank_local', 'Wallet to Bank Local', 'trim|required|greater_than[0]|decimal');
		$this->form_validation->set_rules('walletbank_inter', 'Wallet to Bank International', 'trim|required|greater_than[0]|decimal');
		$this->form_validation->set_rules('wallet2wallet_send', 'Wallet to Wallet Send', 'trim|required|greater_than[0]|decimal');
		$this->form_validation->set_rules('wallet2wallet_receive', 'Wallet to Wallet Receive', 'trim|required|greater_than[0]|decimal');
		$this->form_validation->set_rules('referral_send', 'Referral Sender', 'trim|required|greater_than[0]|decimal');
		$this->form_validation->set_rules('referral_receive', 'Referral Receiver', 'trim|required|greater_than[0]|decimal');
		$this->form_validation->set_rules('swap', 'Swap', 'trim|required|greater_than[0]|decimal');
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required|max_length[3]|min_length[3]');

		$input		= $this->input;
		$currency   = $this->security->xss_clean($input->post("currency"));

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
			redirect(base_url() . "admin/fee/editfee/" . $currency);
			return;
		}

		$topup		            = $this->security->xss_clean($input->post("topup"));
		$walletbank_local       = $this->security->xss_clean($input->post("walletbank_local"));
		$walletbank_inter	    = $this->security->xss_clean($input->post("walletbank_inter"));
		$wallet2wallet_send     = $this->security->xss_clean($input->post("wallet2wallet_send"));
		$wallet2wallet_receive  = $this->security->xss_clean($input->post("wallet2wallet_receive"));
		$referral_send		    = $this->security->xss_clean($input->post("referral_send"));
		$referral_receive       = $this->security->xss_clean($input->post("referral_receive"));
		$swap		            = $this->security->xss_clean($input->post("swap"));

		$mdata = array(
			"topup"                 => $topup,
			"walletbank_circuit"    => $walletbank_local,
			"walletbank_outside"    => $walletbank_inter,
			"wallet_send"           => $wallet2wallet_send,
			"wallet_receiver"       => $wallet2wallet_receive,
			"referral_send"         => $referral_send,
			"referral_receive"      => $referral_receive,
			"swap"                  => $swap,
			"currency"              => $currency,
		);
		$result = apitrackless("https://api.tracklessbank.com/v1/admin/fee/setFee", json_encode($mdata));
		if ($result->code == 200) {
			$this->session->set_flashdata("success", "Default Fee is successfully updated");
			redirect('admin/fee');
		} else {
			$this->session->set_flashdata("failed", $result->message);
		}
	}
}