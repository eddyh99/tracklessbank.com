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
        if (
            ($_SESSION["currency"] == "USD") ||
            ($_SESSION["currency"] == "EUR") ||
            ($_SESSION["currency"] == "AUD") ||
            ($_SESSION["currency"] == "NZD") ||
            ($_SESSION["currency"] == "CAD") ||
            ($_SESSION["currency"] == "HUF") ||
            ($_SESSION["currency"] == "SGD") ||
            ($_SESSION["currency"] == "TRY") ||
            ($_SESSION["currency"] == "GBP") ||
            ($_SESSION["currency"] == "RON")
        ) {
            $this->form_validation->set_rules('number_circuit', 'Account Number', 'trim');
            $this->form_validation->set_rules('name_circuit', 'Circuit Registered Name', 'trim');
            if (($_SESSION["currency"] == "GBP")) {
                $this->form_validation->set_rules('routing_circuit', 'Sort code', 'trim');
            } else {
                $this->form_validation->set_rules('routing_circuit', 'Swift', 'trim');
            }
            $this->form_validation->set_rules('transit_circuit', 'Transit Circuit', 'trim');
            $this->form_validation->set_rules('bankname_circuit', 'Circuit Bank Name', 'trim');
            $this->form_validation->set_rules('address_circuit', 'Circuit Bank Address', 'trim');
        }

        if (
            ($_SESSION["currency"] == "USD") ||
            ($_SESSION["currency"] == "EUR") ||
            ($_SESSION["currency"] == "GBP")
        ) {
            $this->form_validation->set_rules('name_outside', 'Outside Registered Name', 'trim');
            $this->form_validation->set_rules('iban_outside', 'Iban', 'trim');
            $this->form_validation->set_rules('bic_outside', 'Bic', 'trim');
            $this->form_validation->set_rules('bankname_outside', 'Ouside Bank Name', 'trim');
            $this->form_validation->set_rules('address_outside', 'Outside Bank Address', 'trim');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', validation_errors());
            redirect(base_url() . "m3rc4n73/bank");
            return;
        }

        $input = $this->input;

        $c_account_number = $this->security->xss_clean($input->post("number_circuit"));
        $c_registered_name = $this->security->xss_clean($input->post("name_circuit"));
        $c_routing_number = $this->security->xss_clean($input->post("routing_circuit"));
        $c_routing_number = $this->security->xss_clean($input->post("transit_circuit"));
        $c_bank_name = $this->security->xss_clean($input->post("bankname_circuit"));
        $c_bank_address = $this->security->xss_clean($input->post("address_circuit"));
        $oc_registered_name = $this->security->xss_clean($input->post("name_outside"));
        $oc_iban = $this->security->xss_clean($input->post("iban_outside"));
        $oc_bic = $this->security->xss_clean($input->post("bic_outside"));
        $oc_bank_name = $this->security->xss_clean($input->post("bankname_outside"));
        $oc_bank_address = $this->security->xss_clean($input->post("address_outside"));

        $dataUpdate = array(
            "number_circuit" => $c_account_number,
            "name_circuit" => $c_registered_name,
            "routing_circuit" => $c_routing_number,
            "transit_circuit" => $c_routing_number,
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