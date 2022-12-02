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
        $currency = $_SESSION["currency"];
        $url = "https://api.tracklessbank.com/v1/trackless/bank/getBank?currency=" . $currency;
        $result = apitrackless($url);
        if ($result->code != 200) {
            $bank = NULL;
        } else {
            $bank = $result->message;
        }

        $data = array(
            "title"     => "TracklessBank - Bank",
            "content"   => "admin/bank/bank",
            "bank"      => $bank,
            "mn_bank"   => "active",
            "extra"     => "admin/js/js_btn_disabled"
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function editbank()
    {
        $currency = $_SESSION["currency"];
        $url = "https://api.tracklessbank.com/v1/trackless/bank/getBank?currency=" . $currency;
        $result = apitrackless($url);
        if ($result->code != 200) {
            $bank = NULL;
        } else {
            $bank = $result->message;
        }

        $data = array(
            "title"     => "TracklessBank - Bank",
            "content"   => "admin/bank/bank-edit",
            "bank"      => $bank,
            "mn_bank"   => "active",
            "extra"     => "admin/js/js_btn_disabled"
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function editbank_proses()
    {
        $this->form_validation->set_rules('c_account_number', 'Account Number', 'trim|required');
        $this->form_validation->set_rules('c_registered_name', 'Circuit Registered Name', 'trim|required');
        $this->form_validation->set_rules('c_routing_number', 'Routing Number', 'trim|required');
        $this->form_validation->set_rules('c_bank_name', 'Circuit Bank Name', 'trim');
        $this->form_validation->set_rules('c_bank_address', 'Circuit Bank Address', 'trim|required');
        $this->form_validation->set_rules('oc_registered_name', 'Outside Registered Name', 'trim|required');
        $this->form_validation->set_rules('oc_iban', 'Iban', 'trim|required');
        $this->form_validation->set_rules('oc_bic', 'Bic', 'trim|required');
        $this->form_validation->set_rules('oc_bank_name', 'Ouside Bank Name', 'trim');
        $this->form_validation->set_rules('oc_bank_address', 'Outside Bank Address', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', validation_errors());
            redirect(base_url() . "m3rc4n73/bank");
            return;
        }

        $input = $this->input;

        $c_account_number = $this->security->xss_clean($input->post("c_account_number"));
        $c_registered_name = $this->security->xss_clean($input->post("c_registered_name"));
        $c_routing_number = $this->security->xss_clean($input->post("c_routing_number"));
        $c_bank_name = $this->security->xss_clean($input->post("c_bank_name"));
        $c_bank_address = $this->security->xss_clean($input->post("c_bank_address"));
        $oc_registered_name = $this->security->xss_clean($input->post("oc_registered_name"));
        $oc_iban = $this->security->xss_clean($input->post("oc_iban"));
        $oc_bic = $this->security->xss_clean($input->post("oc_bic"));
        $oc_bank_name = $this->security->xss_clean($input->post("oc_bank_name"));
        $oc_bank_address = $this->security->xss_clean($input->post("oc_bank_address"));

        $dataUpdate = array(
            "number_circuit" => $c_account_number,
            "name_circuit" => $c_registered_name,
            "routing_circuit" => $c_routing_number,
            "bankname_circuit" => $c_bank_name,
            "address_circuit" => $c_bank_address,
            "name_outside" => $oc_registered_name,
            "iban_outside" => $oc_iban,
            "bic_outside" => $oc_bic,
            "bankname_outside" => $oc_bank_name,
            "address_outside" => $oc_bank_address,
            "currency" => $_SESSION["currency"]
        );

        $result = apitrackless("https://api.tracklessbank.com/v1/trackless/bank/setBank", json_encode($dataUpdate));
        if (@$result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect("m3rc4n73/bank");
        } else {
            $this->session->set_flashdata("success", "Bank Already Set");
            redirect("m3rc4n73/bank");
        }
    }
}