<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
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
            "title"     => "TracklessBank - Member",
            "content"   => "admin/member/member",
            "bank"      => apitrackless(URLAPI . "/v1/trackless/member/getAll_bank")->message,
            "mn_member" => "active",
            "sendmail" => "sendmail_cur",
            "extra"     => "admin/member/js/js_member"
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function member()
    {
        $data = array(
            "title"     => "TracklessBank - Member",
            "content"   => "admin/member/member",
            "bank"      => apitrackless(URLAPI . "/v1/trackless/member/getAll_bank")->message,
            "mn_member" => "active",
            "sendmail" => "sendmail",
            "extra"     => "admin/member/js/js_member"
        );

        $this->load->view('admin_template/wrapper', $data);
    }

    public function history($id)
    {
        $data = array(
            "title"     => "TracklessBank - Member History",
            "content"   => "admin/member/member-history",
            "user_id"      => $id,
            "mn_member" => "active",
            "extra"     => "admin/member/js/js_history"
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function get_history_user($id)
    {
        $input = $this->input;
        $user_id = $id;
        $tgl = explode("-", $this->security->xss_clean($input->post("tgl")));
        $awal = date_format(date_create($tgl[0]), "Y-m-d");
        $akhir = date_format(date_create($tgl[1]), "Y-m-d");

        $mdata = array(
            "userid" => $user_id,
            "date_start" => $awal,
            "date_end"  => $akhir,
            "currency"  => $_SESSION["currency"],
            "timezone"  => $_SESSION["time_location"]
        );
        $result = apitrackless(URLAPI . "/v1/trackless/user/getHistory", json_encode($mdata));
        $data["token"] = $this->security->get_csrf_hash();
        $data["history"] = $result->message;
        echo json_encode($data);
    }

    public function get_all()
    {
        if ($_POST["bank_id"] == "all") {
            $mdata = array(
                "timezone"  => $_SESSION["time_location"]
            );
        } else {
            $mdata = array(
                "bank_id"   => $_POST["bank_id"],
                "timezone"  => $_SESSION["time_location"]
            );
        }

        $result = apitrackless(URLAPI . "/v1/trackless/user/getAll", json_encode($mdata));
        if (@$result->code == 200) {
            $dt_disabled_filter = array();
            $dt_active_filter = array();
            foreach ($result->message as $key) {
                if ($key->status == 'active' || $key->status == 'new') {
                    $dt_active_filter[] = $key;
                }
                if ($key->status == 'disabled') {
                    $dt_disabled_filter[] = $key;
                }
            }

            if ($_GET['status'] == 'active') {
                $data["member"] = $dt_active_filter;
            } elseif ($_GET['status'] == 'disabled') {
                $data["member"] = $dt_disabled_filter;
            } else {
                $data["member"] = $dt_active_filter;
            }
        } else {
            $data["member"] = NULL;
        }

        $data["token"] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function activate($id)
    {
        $id = $this->security->xss_clean($id);
        $result = apitrackless(URLAPI . "/v1/trackless/user/setMember?status=activate&userid=" . $id);
        if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('m3rc4n73/member?status=active');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('m3rc4n73/member?status=active');
        }
    }

    public function enabled($id)
    {
        $id = $this->security->xss_clean($id);
        $result = apitrackless(URLAPI . "/v1/trackless/user/setMember?status=enabled&userid=" . $id);
        if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('m3rc4n73/member?status=disabled');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('m3rc4n73/member?status=disabled');
        }
    }

    public function disabled($id)
    {
        $id = $this->security->xss_clean($id);
        $result = apitrackless(URLAPI . "/v1/trackless/user/setMember?status=disabled&userid=" . $id);
        if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('m3rc4n73/member?status=active');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('m3rc4n73/member?status=active');
        }
    }

    function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds')
    {
        $sets = array();
        if (strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if (strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if (strpos($available_sets, 'd') !== false)
            $sets[] = '23456789';
        if (strpos($available_sets, 's') !== false)
            $sets[] = '!@#$%&*?';

        $all = '';
        $password = '';
        foreach ($sets as $set) {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }

        $all = str_split($all);
        for ($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];

        $password = str_shuffle($password);

        if (!$add_dashes)
            return $password;

        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while (strlen($password) > $dash_len) {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;
        return $dash_str;
    }

    public function changepass()
    {
    }

    public function sendmail_listmember()
    {
        if ($_GET["bank"] == "all") {
            $mdata = array(
                "timezone"  => $_SESSION["time_location"]
            );
        } else {
            $mdata = array(
                "bank_id"   => $_GET["bank"],
                "timezone"  => $_SESSION["time_location"]
            );
        }

        $result = apitrackless(URLAPI . "/v1/trackless/user/getAll", json_encode($mdata));
        if (@$result->code == 200) {
            $data['member'] = $result->message;
            $data['bank'] = $_GET["bank"];
        } else {
            $data['member'] = NULL;
            $data['bank'] = $_GET["bank"];
        }
        
        $response = array(
            "message"   => utf8_encode($this->load->view('admin/member/list-member', $data, TRUE))
        );
        echo json_encode($response);
    }

    public function sendmail_cur()
    {
        $data = array(
            "title"     => "Freedybank - Send Email",
            "content"   => "admin/member/sendmail",
            "bank"      => apitrackless(URLAPI . "/v1/trackless/member/getAll_bank")->message,
            "mn_member" => "active",
            "extra"     => "admin/member/js/js_email"
        );

        $this->load->view('admin_template/wrapper2', $data);
    }
    
    public function sendmail()
    {
        $data = array(
            "title"     => "Freedybank - Send Email",
            "content"   => "admin/member/sendmail",
            "bank"      => apitrackless(URLAPI . "/v1/trackless/member/getAll_bank")->message,
            "mn_member" => "active",
            "sendmail" => "sendmail",
            "extra"     => "admin/member/js/js_email"
        );

        $this->load->view('admin_template/wrapper', $data);
    }

    public function sendmail_proses()
    {
        $input      = $this->input;
        $email      = $this->security->xss_clean($input->post("tujuan"));
        $all        = $this->security->xss_clean($input->post("all"));
        $message    = $this->security->xss_clean($input->post("message"));
        $subject    = $this->security->xss_clean($input->post("subject"));
        if ($all == "all") {
            $mdata = array(
                "timezone"  => $_SESSION["time_location"]
            );
            $result = apitrackless(URLAPI . "/v1/trackless/user/getAll", json_encode($mdata));
            $member = array();
            foreach ($result->message as $dt) {
                $temp["email"] = $dt->email;
                array_push($member, $temp);
            }
            mail_member($this->phpmailer_lib->load(), $member, $subject, $message);
        } else {
            mail_member($this->phpmailer_lib->load(), $email, $subject, $message);
        }
        $this->session->set_flashdata('success', "<p style='color:black'>Email is successfully schedule to send</p>");
        redirect(base_url() . "m3rc4n73/member/sendmail");
        return;
    }
}