<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cost extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// error_reporting(0);
		if (empty($this->session->userdata('user_id'))) {
			redirect(base_url());
		}
	}

	public function bcost()
	{
		$data = array(
			"title"     => "TracklessBank - Bank Cost",
			"content"   => "admin/cost/bcost",
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
		);

		$this->load->view('admin_template/wrapper', $data);
	}

	public function editdcost()
	{
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', validation_errors());
			redirect(base_url() . "m3rc4n73/cost/dcost");
			return;
		}

		$input = $this->input;

		$curr = $this->security->xss_clean($input->post("currency"));

		$url = apitrackless("https://api.tracklessbank.com/v1/trackless/cost/getCost?currency=" . $curr);

		$mdata = array();
		if (@$url->code == 200) {
			$mdata = array(
				"topup_circuit_fxd" => number_format($url->message->topup_circuit_fxd, 2, ".", ","),
				"topup_circuit_pct" => number_format($url->message->topup_circuit_pct * 100, 2, ".", ","),
				"topup_outside_fxd" => number_format($url->message->topup_outside_fxd, 2, ".", ","),
				"topup_outside_pct" => number_format($url->message->topup_outside_pct * 100, 2, ".", ","),
				"wallet_sender_fxd" => number_format($url->message->wallet_sender_fxd, 2, ".", ","),
				"wallet_sender_pct" => number_format($url->message->wallet_sender_pct * 100, 2, ".", ","),
				"wallet_receiver_fxd" => number_format($url->message->wallet_receiver_fxd, 2, ".", ","),
				"wallet_receiver_pct" => number_format($url->message->wallet_receiver_pct * 100, 2, ".", ","),
				"walletbank_circuit_fxd" => number_format($url->message->walletbank_circuit_fxd, 2, ".", ","),
				"walletbank_circuit_pct" => number_format($url->message->walletbank_circuit_pct * 100, 2, ".", ","),
				"walletbank_outside_fxd" => number_format($url->message->walletbank_outside_fxd, 2, ".", ","),
				"walletbank_outside_pct" => number_format($url->message->walletbank_outside_pct * 100, 2, ".", ","),
				"swap" => number_format($url->message->swap * 100, 2, ".", ","),
				"swap_fxd" => number_format($url->message->swap_fxd, 2, ".", ","),
			);
		} else {
			$mdata = array(
				"topup_circuit_fxd" => number_format(0, 2, ".", ","),
				"topup_circuit_pct" => number_format(0, 2, ".", ","),
				"topup_outside_fxd" => number_format(0, 2, ".", ","),
				"topup_outside_pct" => number_format(0, 2, ".", ","),
				"wallet_sender_fxd" => number_format(0, 2, ".", ","),
				"wallet_sender_pct" => number_format(0, 2, ".", ","),
				"wallet_receiver_fxd" => number_format(0, 2, ".", ","),
				"wallet_receiver_pct" => number_format(0, 2, ".", ","),
				"walletbank_circuit_fxd" => number_format(0, 2, ".", ","),
				"walletbank_circuit_pct" => number_format(0, 2, ".", ","),
				"walletbank_outside_fxd" => number_format(0, 2, ".", ","),
				"walletbank_outside_pct" => number_format(0, 2, ".", ","),
				"swap" => number_format(0, 2, ".", ","),
				"swap_fxd" => number_format(0, 2, ".", ","),
			);
		}

		$data = array(
			"title"     => "TracklessBank - Default Cost",
			"content"   => "admin/cost/dcost-edit",
			"mn_dcost"  => "active",
			"extra"     => "admin/js/js_btn_disabled",
			"currency"  => apitrackless("https://api.tracklessbank.com/v1/trackless/currency/getAllCurrency")->message,
			"banks" 		=> apitrackless("https://api.tracklessbank.com/v1/trackless/member/getAll_bank")->message,
			"dcost"  	=> $mdata,
			"curr"		=> $curr,
		);

		$this->load->view('admin_template/wrapper', $data);
	}

	public function editdcost_prosses()
	{
		$input = $this->input;
		$curr = $this->security->xss_clean($input->post("currency"));

		if (($curr == "USD") ||
			($curr == "EUR")
		) {
			$this->form_validation->set_rules('topup_circuit_fxd', 'Topup Circuit (Fixed)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('topup_circuit_pct', 'Topup Circuit (%)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('topup_outside_fxd', 'Topup Outside (Fixed)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('topup_outside_pct', 'Topup Outside (%)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('walletbank_outside_fxd', 'Walletbank Outside (Fixed)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('walletbank_outside_pct', 'Walletbank Outside (%)', 'trim|required|greater_than_equal_to[0]');
		}

		if (($curr == "AUD") ||
			($curr == "NZD") ||
			($curr == "CAD") ||
			($curr == "HUF") ||
			($curr == "SGD") ||
			($curr == "TRY")
		) {
			$this->form_validation->set_rules('topup_circuit_fxd', 'Topup Circuit (Fixed)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('topup_circuit_pct', 'Topup Circuit (%)', 'trim|required|greater_than_equal_to[0]');
		}

		$this->form_validation->set_rules('currency', 'Currency', 'trim|required');
		$this->form_validation->set_rules('wallet_sender_fxd', 'Wallet Sender (Fixed)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('wallet_sender_pct', 'Wallet Sender (%)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('wallet_receiver_fxd', 'Wallet Receiver (Fixed)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('wallet_receiver_pct', 'Wallet Receiver (%)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('walletbank_circuit_fxd', 'Walletbank Circuit (Fixed)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('walletbank_circuit_pct', 'Walletbank Circuit (%)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('swap', 'Swap (%)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('swap_fxd', 'Swap (Fixed)', 'trim|required|greater_than_equal_to[0]');


		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', validation_errors());
			redirect(base_url() . "m3rc4n73/cost/dcost");
			return;
		}

		$topup_circuit_fxd = $this->security->xss_clean($input->post("topup_circuit_fxd"));
		$topup_circuit_pct = $this->security->xss_clean($input->post("topup_circuit_pct"));
		$topup_outside_fxd = $this->security->xss_clean($input->post("topup_outside_fxd"));
		$topup_outside_pct = $this->security->xss_clean($input->post("topup_outside_pct"));
		$wallet_sender_fxd = $this->security->xss_clean($input->post("wallet_sender_fxd"));
		$wallet_sender_pct = $this->security->xss_clean($input->post("wallet_sender_pct"));
		$wallet_receiver_fxd = $this->security->xss_clean($input->post("wallet_receiver_fxd"));
		$wallet_receiver_pct = $this->security->xss_clean($input->post("wallet_receiver_pct"));
		$walletbank_circuit_fxd = $this->security->xss_clean($input->post("walletbank_circuit_fxd"));
		$walletbank_circuit_pct = $this->security->xss_clean($input->post("walletbank_circuit_pct"));
		$walletbank_outside_fxd = $this->security->xss_clean($input->post("walletbank_outside_fxd"));
		$walletbank_outside_pct = $this->security->xss_clean($input->post("walletbank_outside_pct"));
		$swap = $this->security->xss_clean($input->post("swap"));
		$swap_fxd = $this->security->xss_clean($input->post("swap_fxd"));

		if ($topup_circuit_fxd == '') {
			$topup_circuit_fxd = 0;
		}
		if ($topup_circuit_pct == '') {
			$topup_circuit_pct = 0;
		}
		if ($topup_outside_fxd == '') {
			$topup_outside_fxd = 0;
		}
		if ($topup_outside_pct == '') {
			$topup_outside_pct = 0;
		}
		if ($wallet_sender_fxd == '') {
			$wallet_sender_fxd = 0;
		}
		if ($wallet_sender_pct == '') {
			$wallet_sender_pct = 0;
		}
		if ($wallet_receiver_fxd == '') {
			$wallet_receiver_fxd = 0;
		}
		if ($wallet_receiver_pct == '') {
			$wallet_receiver_pct = 0;
		}
		if ($walletbank_circuit_fxd == '') {
			$walletbank_circuit_fxd = 0;
		}
		if ($walletbank_circuit_pct == '') {
			$walletbank_circuit_pct = 0;
		}
		if ($walletbank_outside_fxd == '') {
			$walletbank_outside_fxd = 0;
		}
		if ($walletbank_outside_pct == '') {
			$walletbank_outside_pct = 0;
		}
		if ($swap == '') {
			$swap = 0;
		}
		if ($swap_fxd == '') {
			$swap_fxd = 0;
		}

		$dataUpdate = array(
			"topup_circuit_fxd" => $topup_circuit_fxd,
			"topup_circuit_pct" => $topup_circuit_pct / 100,
			"topup_outside_fxd" => $topup_outside_fxd,
			"topup_outside_pct" => $topup_outside_pct / 100,
			"wallet_sender_fxd" => $wallet_sender_fxd,
			"wallet_sender_pct" => $wallet_sender_pct / 100,
			"wallet_receiver_fxd" => $wallet_receiver_fxd,
			"wallet_receiver_pct" => $wallet_receiver_pct / 100,
			"walletbank_circuit_fxd" => $walletbank_circuit_fxd,
			"walletbank_circuit_pct" => $walletbank_circuit_pct / 100,
			"walletbank_outside_fxd" => $walletbank_outside_fxd,
			"walletbank_outside_pct" => $walletbank_outside_pct / 100,
			"swap" => $swap / 100,
			"swap_fxd" => $swap_fxd,
			"currency" => $curr,
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
	public function editbcost()
	{
		$input = $this->input;
		if (empty($_GET['currency'])) {
			$this->form_validation->set_rules('currency', 'Currency', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('failed', validation_errors());
				redirect(base_url() . "m3rc4n73/cost/bcost");
				return;
			}
			$curr = $this->security->xss_clean($input->post("currency"));
		} else {
			$curr = $_GET['currency'];
		}

		$url = apitrackless("https://api.tracklessbank.com/v1/trackless/cost/getWiseCost?currency=" . $curr);

		$mdata = array();
		if (@$url->code == 200) {
			$mdata = array(
				"transfer_circuit_fxd" => number_format($url->message->transfer_circuit_fxd, 2, ".", ","),
				"transfer_circuit_pct" => number_format($url->message->transfer_circuit_pct * 100, 2, ".", ","),
				"transfer_outside_fxd" => number_format($url->message->transfer_outside_fxd, 2, ".", ","),
				"transfer_outside_pct" => number_format($url->message->transfer_outside_pct * 100, 2, ".", ","),
				"topup_circuit_fxd" => number_format($url->message->topup_circuit_fxd, 2, ".", ","),
				"topup_circuit_pct" => number_format($url->message->topup_circuit_pct * 100, 2, ".", ","),
				"topup_outside_fxd" => number_format($url->message->topup_outside_fxd, 2, ".", ","),
				"topup_outside_pct" => number_format($url->message->topup_outside_pct * 100, 2, ".", ",")
			);
		} else {
			$mdata = array(
				"transfer_circuit_fxd" => number_format(0, 2, ".", ","),
				"transfer_circuit_pct" => number_format(0, 2, ".", ","),
				"transfer_outside_fxd" => number_format(0, 2, ".", ","),
				"transfer_outside_pct" => number_format(0, 2, ".", ","),
				"topup_circuit_fxd" => number_format(0, 2, ".", ","),
				"topup_circuit_pct" => number_format(0, 2, ".", ","),
				"topup_outside_fxd" => number_format(0, 2, ".", ","),
				"topup_outside_pct" => number_format(0, 2, ".", ",")
			);
		}

		$data = array(
			"title"     => "TracklessBank - Bank Cost",
			"content"   => "admin/cost/bcost-edit",
			"mn_wcost"  => "active",
			"extra"     => "admin/js/js_btn_disabled",
			"currency"  => apitrackless("https://api.tracklessbank.com/v1/trackless/currency/getAllCurrency")->message,
			"bcost"  	=> $mdata,
			"curr"		=> $curr,
		);

		$this->load->view('admin_template/wrapper', $data);
	}

	public function editbcost_prosses()
	{

		$input = $this->input;
		$curr = $this->security->xss_clean($input->post("currency"));

		if (($curr == "USD") ||
			($curr == "EUR")
		) {
			$this->form_validation->set_rules('topup_circuit_fxd', 'Topup Circuit (Fixed)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('topup_circuit_pct', 'Topup Circuit (%)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('topup_outside_fxd', 'Topup Outside (Fixed)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('topup_outside_pct', 'Topup Outside (%)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('transfer_outside_fxd', 'Walletbank Outside (Fixed)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('transfer_outside_pct', 'Walletbank Outside (%)', 'trim|required|greater_than_equal_to[0]');
		}

		if (($curr == "AUD") ||
			($curr == "NZD") ||
			($curr == "CAD") ||
			($curr == "HUF") ||
			($curr == "SGD") ||
			($curr == "TRY")
		) {
			$this->form_validation->set_rules('topup_circuit_fxd', 'Topup Circuit (Fixed)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('topup_circuit_pct', 'Topup Circuit (%)', 'trim|required|greater_than_equal_to[0]');
		}

		$this->form_validation->set_rules('currency', 'Currency', 'trim|required');
		$this->form_validation->set_rules('transfer_circuit_fxd', 'Walletbank Circuit (Fixed)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('transfer_circuit_pct', 'Walletbank Circuit (%)', 'trim|required|greater_than_equal_to[0]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', validation_errors());
			redirect(base_url() . "m3rc4n73/cost/bcost");
			return;
		}

		$transfer_circuit_fxd = $this->security->xss_clean($input->post("transfer_circuit_fxd"));
		$transfer_circuit_pct = $this->security->xss_clean($input->post("transfer_circuit_pct"));
		$transfer_outside_fxd = $this->security->xss_clean($input->post("transfer_outside_fxd"));
		$transfer_outside_pct = $this->security->xss_clean($input->post("transfer_outside_pct"));
		$topup_circuit_fxd = $this->security->xss_clean($input->post("topup_circuit_fxd"));
		$topup_circuit_pct = $this->security->xss_clean($input->post("topup_circuit_pct"));
		$topup_outside_fxd = $this->security->xss_clean($input->post("topup_outside_fxd"));
		$topup_outside_pct = $this->security->xss_clean($input->post("topup_outside_pct"));

		if ($topup_circuit_fxd == '') {
			$topup_circuit_fxd = 0;
		}
		if ($topup_circuit_pct == '') {
			$topup_circuit_pct = 0;
		}
		if ($topup_outside_fxd == '') {
			$topup_outside_fxd = 0;
		}
		if ($topup_outside_pct == '') {
			$topup_outside_pct = 0;
		}
		if ($transfer_circuit_fxd == '') {
			$transfer_circuit_fxd = 0;
		}
		if ($transfer_circuit_pct == '') {
			$transfer_circuit_pct = 0;
		}
		if ($transfer_outside_fxd == '') {
			$transfer_outside_fxd = 0;
		}
		if ($transfer_outside_pct == '') {
			$transfer_outside_pct = 0;
		}

		$dataUpdate = array(
			"walletbank_circuit_fxd" => $transfer_circuit_fxd,
			"walletbank_circuit_pct" => $transfer_circuit_pct / 100,
			"walletbank_outside_fxd" => $transfer_outside_fxd,
			"walletbank_outside_pct" => $transfer_outside_pct / 100,
			"topup_circuit_fxd" => $topup_circuit_fxd,
			"topup_circuit_pct" => $topup_circuit_pct / 100,
			"topup_outside_fxd" => $topup_outside_fxd,
			"topup_outside_pct" => $topup_outside_pct / 100,
			"currency" => $curr
		);

		$result = apitrackless("https://api.tracklessbank.com/v1/trackless/cost/setWisecost", json_encode($dataUpdate));
		if (@$result->code != 200) {
			$this->session->set_flashdata("failed", $result->message);
			redirect("m3rc4n73/cost/bcost");
		} else {
			$this->session->set_flashdata("success", "Bank Cost Already Set");
			redirect("m3rc4n73/cost/bcost");
		}
	}

	public function getbcost()
	{
		$currency		= $this->security->xss_clean($_GET["currency"]);

		$mfee = apitrackless("https://api.tracklessbank.com/v1/trackless/cost/getWiseCost?currency=" . $currency);

		$mdata = array();
		if (@$mfee->code == 200) {
			$mdata = array(
				"transfer_circuit_fxd" => number_format($mfee->message->transfer_circuit_fxd, 2, ".", ","),
				"transfer_circuit_pct" => number_format($mfee->message->transfer_circuit_pct * 100, 2, ".", ","),
				"transfer_outside_fxd" => number_format($mfee->message->transfer_outside_fxd, 2, ".", ","),
				"transfer_outside_pct" => number_format($mfee->message->transfer_outside_pct * 100, 2, ".", ","),
				"topup_circuit_fxd" => number_format($mfee->message->topup_circuit_fxd, 2, ".", ","),
				"topup_circuit_pct" => number_format($mfee->message->topup_circuit_pct * 100, 2, ".", ","),
				"topup_outside_fxd" => number_format($mfee->message->topup_outside_fxd, 2, ".", ","),
				"topup_outside_pct" => number_format($mfee->message->topup_outside_pct * 100, 2, ".", ",")
			);
		} else {
			$mdata = array(
				"transfer_circuit_fxd" => number_format(0, 2, ".", ","),
				"transfer_circuit_pct" => number_format(0, 2, ".", ","),
				"transfer_outside_fxd" => number_format(0, 2, ".", ","),
				"transfer_outside_pct" => number_format(0, 2, ".", ","),
				"topup_circuit_fxd" => number_format(0, 2, ".", ","),
				"topup_circuit_pct" => number_format(0, 2, ".", ","),
				"topup_outside_fxd" => number_format(0, 2, ".", ","),
				"topup_outside_pct" => number_format(0, 2, ".", ",")
			);
		}
		echo json_encode($mdata);
	}

	public function getdcost()
	{
		$currency		= $this->security->xss_clean($_GET["currency"]);
		$mfee = apitrackless("https://api.tracklessbank.com/v1/trackless/cost/getCost?currency=" . $currency);
		$mdata = array();
		if (@$mfee->code == 200) {
			$mdata = array(
				"topup_circuit_fxd" => number_format($mfee->message->topup_circuit_fxd, 2, ".", ","),
				"topup_circuit_pct" => number_format($mfee->message->topup_circuit_pct * 100, 2, ".", ","),
				"topup_outside_fxd" => number_format($mfee->message->topup_outside_fxd, 2, ".", ","),
				"topup_outside_pct" => number_format($mfee->message->topup_outside_pct * 100, 2, ".", ","),
				"wallet_sender_fxd" => number_format($mfee->message->wallet_sender_fxd, 2, ".", ","),
				"wallet_sender_pct" => number_format($mfee->message->wallet_sender_pct * 100, 2, ".", ","),
				"wallet_receiver_fxd" => number_format($mfee->message->wallet_receiver_fxd, 2, ".", ","),
				"wallet_receiver_pct" => number_format($mfee->message->wallet_receiver_pct * 100, 2, ".", ","),
				"walletbank_circuit_fxd" => number_format($mfee->message->walletbank_circuit_fxd, 2, ".", ","),
				"walletbank_circuit_pct" => number_format($mfee->message->walletbank_circuit_pct * 100, 2, ".", ","),
				"walletbank_outside_fxd" => number_format($mfee->message->walletbank_outside_fxd, 2, ".", ","),
				"walletbank_outside_pct" => number_format($mfee->message->walletbank_outside_pct * 100, 2, ".", ","),
				"swap" => number_format($mfee->message->swap * 100, 2, ".", ","),
				"swap_fxd" => number_format($mfee->message->swap_fxd, 2, ".", ","),
			);
		} else {
			$mdata = array(
				"topup_circuit_fxd" => number_format(0, 2, ".", ","),
				"topup_circuit_pct" => number_format(0, 2, ".", ","),
				"topup_outside_fxd" => number_format(0, 2, ".", ","),
				"topup_outside_pct" => number_format(0, 2, ".", ","),
				"wallet_sender_fxd" => number_format(0, 2, ".", ","),
				"wallet_sender_pct" => number_format(0, 2, ".", ","),
				"wallet_receiver_fxd" => number_format(0, 2, ".", ","),
				"wallet_receiver_pct" => number_format(0, 2, ".", ","),
				"walletbank_circuit_fxd" => number_format(0, 2, ".", ","),
				"walletbank_circuit_pct" => number_format(0, 2, ".", ","),
				"walletbank_outside_fxd" => number_format(0, 2, ".", ","),
				"walletbank_outside_pct" => number_format(0, 2, ".", ","),
				"swap" => number_format(0, 2, ".", ","),
				"swap_fxd" => number_format(0, 2, ".", ","),
			);
		}
		echo json_encode($mdata);
	}

	public function sendmail_proses()
	{
		$subject    = "New Currency Activation";

		$result = apitrackless("https://api.tracklessbank.com/v1/trackless/member/getAll_bank");
		foreach ($result->message as $dt) {
			$email = $dt->email;
			$message = "
				Hello " . $dt->bank_name . "<br>
				<br>
				There's a new currency " . $_GET['currency'] . " has been activated and ready to used, please update your fee immediately.<br>
				<br>
				Thank you";
			$this->send_email($email, $subject, $message);
		}
		echo json_encode('Success');
	}

	public function send_email($email, $subject, $message)
	{
		$mail = $this->phpmailer_lib->load();

		$mail->isSMTP();
		$mail->Host         = 'mail.tracklessbank.com';
		$mail->SMTPAuth     = true;
		$mail->Username     = 'no-reply@tracklessbank.com';
		$mail->Password     = 'NaBbrvu[*Tn^';
		// $mail->SMTPDebug    = 2;
		$mail->SMTPAutoTLS	= true;
		$mail->SMTPSecure	= "tls";
		$mail->Port			= 587;
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);

		$mail->setFrom('no-reply@tracklessbank.com', 'TracklessBank');
		$mail->isHTML(true);

		$mail->ClearAllRecipients();

		$mail->Subject = $subject;
		$mail->AddAddress($email);

		$mail->msgHTML($message);
		$mail->send();
	}
}