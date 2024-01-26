<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Card extends CI_Controller
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
        $url = URLAPI . "/v1/trackless/card/getBank";
        $result = apitrackless($url);
        if ($result->code != 200) {
            $card = NULL;
        } else {
            $card = $result->message;
        }

        $data = array(
            "title"     => "TracklessBank - Card Bank",
            "content"   => "admin/card/bankcard",
            "card"      => $card,
            'mn_opcard' => "active",
            "mn_card"   => "active",
            "sub_card"  => "active",
            "extra"     => "admin/js/js_btn_disabled"
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function editbankcard()
    {
        $url = URLAPI . "/v1/trackless/card/getBank";
        $result = apitrackless($url);
        if ($result->code != 200) {
            $card = NULL;
        } else {
            $card = $result->message;
        }

        $data = array(
            "title"     => "TracklessBank - Bank",
            "content"   => "admin/card/bankcard-edit",
            "card"      => $card,
            'mn_opcard' => "active",
            "sub_card"  => "active",
            "mn_card"   => "active",
            "extra"     => "admin/js/js_btn_disabled"
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function editcard_proses()
    {

        $this->form_validation->set_rules('registered_name', 'Registered Name', 'trim|required');
        $this->form_validation->set_rules('iban', 'Iban', 'trim|required');
        $this->form_validation->set_rules('causal', 'Causal', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', validation_errors());
            redirect(base_url() . "m3rc4n73/card");
            return;
        }

        $input = $this->input;
        $registered_name = $this->security->xss_clean($input->post("registered_name"));
        $iban            = $this->security->xss_clean($input->post("iban"));
        $causal          = $this->security->xss_clean($input->post("causal"));

        $dataUpdate = array(
            "currency"          => 'EUR',
            "registered_name"   => $registered_name,
            "iban"              => $iban,
            "causal"            => $causal,
        );

        $result = apitrackless(URLAPI . "/v1/trackless/card/setcardBank", json_encode($dataUpdate));
        if (@$result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect("m3rc4n73/card");
        } else {
            $this->session->set_flashdata("success", "Card Bank Already Set");
            redirect("m3rc4n73/card");
        }
    }
    
    public function cardtopup(){
        if ($_GET["status"]=='proses'){
            $data = array(
                "title"     => "TracklessBank - Request Topup Card (Proses)",
                "content"   => "admin/card/topup",
                "bank"      => apitrackless(URLAPI . "/v1/trackless/member/getAll_bank")->message,
                'mn_opcard' => "active",
                "sub_proses" => "active",
                "mn_card"   => "active",
                "extra"     => "admin/card/js/js_topup",
            );
        }else{
            $data = array(
                "title"     => "TracklessBank - Request Topup Card",
                "content"   => "admin/card/topup",
                "bank"      => apitrackless(URLAPI . "/v1/trackless/member/getAll_bank")->message,
                'mn_opcard' => "active",
                "sub_topup" => "active",
                "mn_card"   => "active",
                "extra"     => "admin/card/js/js_topup",
            );
        }

        $this->load->view('admin_template/wrapper2', $data);
    }
    
    public function historycardtopup()
    {
        $input = $this->input;
        $tgl = explode("-", $this->security->xss_clean($input->post("tgl")));
        $bank = $this->security->xss_clean($input->post("bank"));
        $awal = date_format(date_create($tgl[0]), "Y-m-d");
        $akhir = date_format(date_create($tgl[1]), "Y-m-d");

        if ($bank == "all") {
            $mdata = array(
                "date_start" => $awal,
                "date_end"  => $akhir,
                "currency"  => $_SESSION["currency"],
                "timezone"  => $_SESSION["time_location"]
            );
        } else {
            $mdata = array(
                "bank_id"    => $bank,
                "date_start" => $awal,
                "date_end"  => $akhir,
                "currency"  => $_SESSION["currency"],
                "timezone"  => $_SESSION["time_location"]
            );
        }

        $result = apitrackless(URLAPI . "/v1/trackless/card/gethistory_cardtopup", json_encode($mdata));
        $history=[];
        if ($_GET["status"]=='proses'){
            foreach ($result->message as $dt){
                if ($dt->proses=='yes'){
                    $history[]=$dt;
                }
            }
        }else{
            foreach ($result->message as $dt){
                if ($dt->proses=='no'){
                    $history[]=$dt;
                }
            }
        }
        $data["token"]   = $this->security->get_csrf_hash();
        $data["history"] = $history;
        echo json_encode($data);
    }

    public function processtopup($id)
    {
        $mdata = array(
            "transaction_id" => base64_decode($id),
        );
        $result = apitrackless(URLAPI . "/v1/trackless/card/process_cardtopup", json_encode($mdata));
        redirect("/m3rc4n73/card/cardtopup");
    }
    
    public function cardexpired(){
        
    }
    
    public function linktowallet(){
         $data = array(
                "title"     => "TracklessBank - Link to Wallet",
                "content"   => "admin/card/physical-card",
                'mn_opcard' => "active",
                "sub_fisik" => "active",
                "mn_card"   => "active",
                "extra"     => "admin/card/js/js_physical-card",
            );
        $this->load->view('admin_template/wrapper2', $data);
    }
    
    public function showcard(){
        $result = apitrackless(URLAPI . "/v1/trackless/card/get_physicalcard");
        $data["history"] = $result->message;
        echo json_encode($data);
    }
    
    public function linkcard($id){
        $mdata = array(
            "id" => base64_decode($id),
        );
        $result = apitrackless(URLAPI . "/v1/trackless/card/link_physicalcard", json_encode($mdata));
        redirect("/m3rc4n73/card/linktowallet");

    }

}