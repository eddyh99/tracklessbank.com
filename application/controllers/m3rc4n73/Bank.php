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


        $url = URLAPI . "/v1/trackless/bank/getBank?currency=" . $currency;
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
        $url = URLAPI . "/v1/trackless/bank/getBank?currency=" . $currency;
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
            if (
                ($_SESSION["currency"] == "NZD") ||
                ($_SESSION["currency"] == "CAD") ||
                ($_SESSION["currency"] == "HUF") ||
                ($_SESSION["currency"] == "RON") ||
                ($_SESSION["currency"] == "SGD") ||
                ($_SESSION["currency"] == "AUD")
            ) {
                $this->form_validation->set_rules('number_circuit', 'Account Number', 'trim');
            } else {
                $this->form_validation->set_rules('number_circuit', 'IBAN', 'trim');
            }

            $this->form_validation->set_rules('name_circuit', 'Circuit Registered Name', 'trim');
            if (
                ($_SESSION["currency"] != "NZD") &&
                ($_SESSION["currency"] != "HUF") &&
                ($_SESSION["currency"] != "TRY")
            ) {
                if (($_SESSION["currency"] == "GBP")) {
                    $this->form_validation->set_rules('routing_circuit', 'Sort code', 'trim');
                } elseif (($_SESSION["currency"] == "AUD")) {
                    $this->form_validation->set_rules('routing_circuit', 'BSB code', 'trim');
                } elseif (($_SESSION["currency"] == "CAD")) {
                    $this->form_validation->set_rules('routing_circuit', 'Institution number', 'trim');
                } elseif (($_SESSION["currency"] == "RON") ||
                    ($_SESSION["currency"] == "SGD")
                ) {
                    $this->form_validation->set_rules('routing_circuit', 'Bank code', 'trim');
                } else {
                    $this->form_validation->set_rules('routing_circuit', 'Swift', 'trim');
                }
            }

            if (
                ($_SESSION["currency"] == "GBP") ||
                ($_SESSION["currency"] == "CAD")
            ) {
                if (($_SESSION["currency"] == "GBP")) {
                    $this->form_validation->set_rules('transit_circuit', 'Account number', 'trim');
                }
                if (($_SESSION["currency"] == "CAD")) {
                    $this->form_validation->set_rules('transit_circuit', 'Transit number', 'trim');
                }
            }
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

            if (($_SESSION["currency"] == "GBP")) {
                $this->form_validation->set_rules('bic_outside', 'SWIFT/BIC', 'trim');
            } else {
                $this->form_validation->set_rules('bic_outside', 'Swift', 'trim');
            }

            $this->form_validation->set_rules('bankname_outside', 'Ouside Bank Name', 'trim');
            $this->form_validation->set_rules('address_outside', 'Outside Bank Address', 'trim');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', validation_errors());
            redirect(base_url() . "m3rc4n73/bank");
            return;
        }

        $input = $this->input;

        $number_circuit = $this->security->xss_clean($input->post("number_circuit"));
        $name_circuit = $this->security->xss_clean($input->post("name_circuit"));
        $routing_circuit = $this->security->xss_clean($input->post("routing_circuit"));
        $transit_circuit = $this->security->xss_clean($input->post("transit_circuit"));
        $bankname_circuit = $this->security->xss_clean($input->post("bankname_circuit"));
        $address_circuit = $this->security->xss_clean($input->post("address_circuit"));
        $name_outside = $this->security->xss_clean($input->post("name_outside"));
        $iban_outside = $this->security->xss_clean($input->post("iban_outside"));
        $bic_outside = $this->security->xss_clean($input->post("bic_outside"));
        $bankname_outside = $this->security->xss_clean($input->post("bankname_outside"));
        $address_outside = $this->security->xss_clean($input->post("address_outside"));

        $dataUpdate = array(
            "number_circuit" => $number_circuit,
            "name_circuit" => $name_circuit,
            "routing_circuit" => $routing_circuit,
            "transit_circuit" => $transit_circuit,
            "bankname_circuit" => $bankname_circuit,
            "address_circuit" => $address_circuit,
            "name_outside" => $name_outside,
            "iban_outside" => $iban_outside,
            "bic_outside" => $bic_outside,
            "bankname_outside" => $bankname_outside,
            "address_outside" => $address_outside,
            "currency" => $_SESSION["currency"]
        );

        $result = apitrackless(URLAPI . "/v1/trackless/bank/setBank", json_encode($dataUpdate));
        if (@$result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect("m3rc4n73/bank");
        } else {
            $this->session->set_flashdata("success", "Bank Already Set");
            redirect("m3rc4n73/bank");
        }
    }
}