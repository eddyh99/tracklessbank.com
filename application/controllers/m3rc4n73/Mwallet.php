<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mwallet extends CI_Controller
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
        if (!empty($_GET["cur"])) {
            $url = "https://api.tracklessbank.com/v1/trackless/wallet/balance_ByCurrency?currency=" . $_GET["cur"];
            $result = apitrackless($url);
            if ($result->code == 200) {
                $_SESSION["currency"] = @$_GET["cur"];
                $_SESSION["symbol"] = $result->message->detail->symbol;
                $_SESSION["balance"] = $result->message->balance;
            } else {
                $result = apitrackless($url);
                $_SESSION["currency"] = "USD";
                $_SESSION["symbol"] = "&dollar;";
                $_SESSION["balance"] = apitrackless("https://api.tracklessbank.com/v1/admin/wallet/balance_ByCurrency?currency=USD")->message->balance;
            }
        }

        $data = array(
            "title"     => "TracklessBank - Master Wallet",
            "content"   => "admin/mwallet/master-wallet",
            "mn_mwallet" => "active",
            "extra"     => "admin/mwallet/js/js_masterwallet",
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function get_history()
    {
        $input = $this->input;
        $tgl = explode("-", $this->security->xss_clean($input->post("tgl")));
        $awal = date_format(date_create($tgl[0]), "Y-m-d");
        $akhir = date_format(date_create($tgl[1]), "Y-m-d");

        $mdata = array(
            "date_start" => $awal,
            "date_end"  => $akhir,
            "currency"  => $_SESSION["currency"],
            "timezone"  => $_SESSION["time_location"]
        );
        $result = apitrackless("https://api.tracklessbank.com/v1/admin/wallet/gethistory_bycurrency", json_encode($mdata));
        $data["token"] = $this->security->get_csrf_hash();
        $data["history"] = $result->message;
        echo json_encode($data);
    }

    public function withdraw()
    {
        $data = array(
            "title"     => "TracklessBank - Withdraw Master Wallet",
            "content"   => "admin/mwallet/withdraw-mwallet",
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function wdlocal()
    {
        $data = array(
            "title"     => "TracklessBank - Withdraw Local",
            "content"   => "admin/mwallet/withdraw-local",
            "extra"     => "admin/js/js_btn_disabled",
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function wdinter()
    {
        $data = array(
            "title"     => "TracklessBank - Withdraw International",
            "content"   => "admin/mwallet/withdraw-inter",
            "extra"     => "admin/js/js_btn_disabled",
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function wdconfirm()
    {
        $this->form_validation->set_rules('account_number', 'Account Number/IBAN', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('recipient', 'Recipient', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('causal', 'Causal', 'trim|required');
        $this->form_validation->set_rules(
            'transfer_type',
            'Transfer Type',
            array(
                'trim',
                'required',
                array(
                    'undefined',
                    function ($str) {
                        return $str === "circuit" || $str === "outside";
                    }
                )
            ),
            array(
                'undefined' => 'Unknown {field} [' . $this->input->post('transfer_type') . ']',
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed", validation_errors());
            redirect(base_url() . "m3rc4n73/mwallet/wdlocal");
        }

        $input    = $this->input;
        $mdata = array(
            "amount"            => $this->security->xss_clean($input->post("amount")),
            "currency"          => $_SESSION["currency"],
            "transfer_type"     => $this->security->xss_clean($input->post("transfer_type")),
        );

        $result = apitrackless("https://api.tracklessbank.com/v1/admin/withdraw/withdrawSummary", json_encode($mdata));

        if (@$result->code != 200) {
            $this->session->set_flashdata("failed", "Insuffisient Fund");
            redirect(base_url() . "m3rc4n73/mwallet/wdlocal");
        }

        $transfer_type  = $this->security->xss_clean($input->post("transfer_type"));
        $temp["fee"]               = $result->message->fee;
        $temp["deduct"]            = $result->message->deduct;
        $temp["account_number"]    = $this->security->xss_clean($input->post("account_number"));
        $temp["recipient"]         = $this->security->xss_clean($input->post("recipient"));
        $temp["amount"]            = $this->security->xss_clean($input->post("amount"));
        $temp["causal"]            = $this->security->xss_clean($input->post("causal"));
        $temp["transfer_type"]     = $transfer_type;
        $temp["swift"]             = $this->security->xss_clean($input->post("swift"));

        if ($_SESSION["currency"] == "USD") {
            if ($transfer_type == "circuit") {
                $country    = "US";
            } elseif ($transfer_type == "outside") {
                $country     = $this->security->xss_clean($input->post("country"));
            }

            $temp["bank_name"]      = $this->security->xss_clean($input->post("bank_name"));
            $temp["address"]        = $this->security->xss_clean($input->post("address"));
            $temp["account_type"]   = $this->security->xss_clean($input->post("account_type"));
            $temp["city"]           = $this->security->xss_clean($input->post("city"));
            $temp["state"]          = $this->security->xss_clean($input->post("state"));
            $temp["postalcode"]     = $this->security->xss_clean($input->post("postalcode"));
            $temp["country"]        = $country;
        }

        $data = array(
            "title"     => "TracklessBank - Withdraw Confirm",
            "content"   => "admin/mwallet/wdconfirm",
            "extra"     => "admin/js/js_btn_disabled",
            "data"      => $temp
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function wdnotif()
    {
        $input          = $this->input;
        $transfer_type  = $this->security->xss_clean($input->post("transfer_type"));
        $this->form_validation->set_rules('account_number', 'Account Number/IBAN', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('recipient', 'Recipient', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('causal', 'Causal', 'trim|required');
        if ($_SESSION["currency"] == "USD") {
            if ($transfer_type == 'circuit') {
                $this->form_validation->set_rules(
                    'account_type',
                    'Account Type',
                    array(
                        'trim',
                        'required',
                        array(
                            'undefined',
                            function ($str) {
                                return $str === "savings" || $str === "checking";
                            }
                        )
                    ),
                    array(
                        'undefined' => 'Unknown {field} [' . $this->input->post('account_type') . ']',
                    )
                );
            }
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed", validation_errors());
            redirect(base_url() . "m3rc4n73/mwallet/withdraw");
        }

        $amount         = $this->security->xss_clean($input->post("amount"));
        $transfer_type  = $this->security->xss_clean($input->post("transfer_type"));
        $recipient      = $this->security->xss_clean($input->post("recipient"));
        $account_number = $this->security->xss_clean($input->post("account_number"));
        $causal         = $this->security->xss_clean($input->post("causal"));
        $swift          = $this->security->xss_clean($input->post("swift"));
        if ($_SESSION["currency"] == "USD") {
            $bank_name      = $this->security->xss_clean($input->post("bank_name"));
            $address        = $this->security->xss_clean($input->post("address"));
            $city           = $this->security->xss_clean($input->post("city"));
            $state          = $this->security->xss_clean($input->post("state"));
            $postalcode     = $this->security->xss_clean($input->post("postalcode"));

            if ($transfer_type == "circuit") {
                $country        = "US";
                $account_type   = $this->security->xss_clean($input->post("account_type"));
            } elseif ($transfer_type == "outside") {
                $country        = $this->security->xss_clean($input->post("country"));
                $account_type   = NULL;
            }
        }

        $mdata = array(
            "userid"            => $_SESSION["user_id"],
            "currency"          => $_SESSION["currency"],
            "amount"            => $amount,
            "transfer_type"     => $transfer_type,
            "bank_detail"   => array(
                "recipient"         => $recipient,
                "account_number"    => $account_number,
                "swift"             => @$swift,
                "bank_name"         => @$bank_name,
                "address"           => @$address,
                "account_type"      => @$account_type,
                "city"              => @$city,
                "state"             => @$state,
                "postalcode"        => @$postalcode,
                "country"           => @$country,
                "causal"            => @$causal,
            )
        );

        $result = apitrackless("https://api.tracklessbank.com/v1/admin/withdraw/withdrawTransfer", json_encode($mdata));

        if (@$result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect(base_url() . "m3rc4n73/mwallet/withdraw");
        }

        $data = array(
            "title"     => "TracklessBank - Withdraw Success",
            "content"   => "admin/mwallet/wdnotif",
            "amount"    => $amount,
            "recipient" => $recipient
        );

        $this->load->view('admin_template/wrapper2', $data);
    }
}