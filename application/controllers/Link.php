<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Link extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function lern_transparency()
    {
        $url = URLAPI . "/v1/trackless/currency/getAllCurrency";
        $currency   = apitrackless($url)->message;

        $data = array(
            "title"     => "TracklessBank",
            "content"   => "home/lern-transparency",
            "currency"   => $currency,
            // "extra"     => "auth/landingpage/js/js_index",
        );

        $this->load->view('tamplate/wrapper', $data);
    }

    public function price_currency()
    {
        $curr = $_GET['currency'];
        $url_cost = URLAPI . "/v1/trackless/cost/getCost?currency=" . $curr;
        $url_wcose = URLAPI . "/v1/trackless/cost/getWiseCost?currency=" . $curr;
        $url_curr = URLAPI . "/v1/trackless/currency/getAllCurrency";
        $cost   = apitrackless($url_cost);
        $wcost   = apitrackless($url_wcose);
        $currency   = apitrackless($url_curr)->message;

        $mdatacost = array();
        if (@$cost->code == 5052) {
            $mdatacost = array(
                "topup_circuit_fxd" => 0,
                "topup_circuit_pct" => 0,
                "topup_outside_fxd" => 0,
                "topup_outside_pct" => 0,
                "wallet_sender_fxd" => 0,
                "wallet_sender_pct" => 0,
                "wallet_receiver_fxd" => 0,
                "wallet_receiver_pct" => 0,
                "walletbank_circuit_fxd" => 0,
                "walletbank_circuit_pct" => 0,
                "walletbank_outside_fxd" => 0,
                "walletbank_outside_pct" => 0,
                "swap" => 0,
                "swap_fxd" => 0,
            );
        } else {
            $mdatacost = array(
                "topup_circuit_fxd" => $cost->message->topup_circuit_fxd,
                "topup_circuit_pct" => $cost->message->topup_circuit_pct * 100,
                "topup_outside_fxd" => $cost->message->topup_outside_fxd,
                "topup_outside_pct" => $cost->message->topup_outside_pct * 100,
                "wallet_sender_fxd" => $cost->message->wallet_sender_fxd,
                "wallet_sender_pct" => $cost->message->wallet_sender_pct * 100,
                "wallet_receiver_fxd" => $cost->message->wallet_receiver_fxd,
                "wallet_receiver_pct" => $cost->message->wallet_receiver_pct * 100,
                "walletbank_circuit_fxd" => $cost->message->walletbank_circuit_fxd,
                "walletbank_circuit_pct" => $cost->message->walletbank_circuit_pct * 100,
                "walletbank_outside_fxd" => $cost->message->walletbank_outside_fxd,
                "walletbank_outside_pct" => $cost->message->walletbank_outside_pct * 100,
                "swap" => $cost->message->swap * 100,
                "swap_fxd" => $cost->message->swap_fxd,
            );
        }

        $mdatawcost = array();
        if (@$wcost->code == 5052) {
            $mdatawcost = array(
                "topup_circuit_fxd" => 0,
                "topup_circuit_pct" => 0,
                "topup_outside_fxd" => 0,
                "topup_outside_pct" => 0,
                "transfer_circuit_fxd" => 0,
                "transfer_circuit_pct" => 0,
                "transfer_outside_fxd" => 0,
                "transfer_outside_pct" => 0
            );
        } else {
            $mdatawcost = array(
                "topup_circuit_fxd" => $wcost->message->topup_circuit_fxd,
                "topup_circuit_pct" => $wcost->message->topup_circuit_pct * 100,
                "topup_outside_fxd" => $wcost->message->topup_outside_fxd,
                "topup_outside_pct" => $wcost->message->topup_outside_pct * 100,
                "transfer_circuit_fxd" => $wcost->message->transfer_circuit_fxd,
                "transfer_circuit_pct" => $wcost->message->transfer_circuit_pct * 100,
                "transfer_outside_fxd" => $wcost->message->transfer_outside_fxd,
                "transfer_outside_pct" => $wcost->message->transfer_outside_pct * 100,
            );
        }

        $data = array(
            "title"     => "FreedyBank",
            "content"   => "home/currency-list-price",
            "getcurrency"   => $curr,
            "currency"   => $currency,
            "cost"   => $mdatacost,
            "wcost"   => $mdatawcost,
            // "extra"     => "auth/landingpage/js/js_index",
        );

        $this->load->view('tamplate/wrapper', $data);
    }
}