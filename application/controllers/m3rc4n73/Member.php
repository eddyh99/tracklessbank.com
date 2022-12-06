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
            "extra"     => "admin/member/js/js_member"
        );

        $this->load->view('admin_template/wrapper', $data);
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
        $data["token"] = $this->security->get_csrf_hash();
        if (@$result->code == 200) {
            $data["member"] = $result->message;
        } else {
            $data["member"] = NULL;
        }
        echo json_encode($data);
    }

    public function activate($id)
    {
        $id = $this->security->xss_clean($id);
        $result = apitrackless(URLAPI . "/v1/trackless/user/setMember?status=activate&userid=" . $id);
        if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('m3rc4n73/member');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('m3rc4n73/member');
        }
    }

    public function enabled($id)
    {
        $id = $this->security->xss_clean($id);
        $result = apitrackless(URLAPI . "/v1/trackless/user/setMember?status=enabled&userid=" . $id);
        if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('m3rc4n73/member');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('m3rc4n73/member');
        }
    }

    public function disabled($id)
    {
        $id = $this->security->xss_clean($id);
        $result = apitrackless(URLAPI . "/v1/trackless/user/setMember?status=disabled&userid=" . $id);
        if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('m3rc4n73/member');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('m3rc4n73/member');
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


    public function sendmail()
    {
        $mdata = array(
            "timezone"  => $_SESSION["time_location"]
        );
        $result = apitrackless(URLAPI . "/v1/trackless/user/getAll", json_encode($mdata));
        if (@$result->code == 200) {
            $member = $result->message;
        } else {
            $member = NULL;
        }
        $data = array(
            "title"     => "Freedybank - Send Email",
            "content"   => "admin/member/sendmail",
            "member"   => $member,
            "mn_member" => "active",
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
            $this->send_email($member, $subject, $message);
        } else {
            $this->send_email($email, $subject, $message);
        }
        $this->session->set_flashdata('success', "<p style='color:black'>Email is successfully schedule to send</p>");
        redirect(base_url() . "m3rc4n73/member/sendmail");
        return;
    }

    public function send_email($email, $subject, $message)
    {
        $mail = $this->phpmailer_lib->load();

        $mail->isSMTP();
        $mail->Host         = 'mail.tracklessbank.com';
        $mail->SMTPAuth     = true;
        $mail->Username     = 'no-reply@tracklessbank.com';
        $mail->Password     = 'NaBbrvu[*Tn^';
        $mail->SMTPAutoTLS    = false;
        $mail->SMTPSecure    = false;
        $mail->Port            = 587;

        $mail->setFrom('no-reply@tracklessbank.com', 'TracklessBank');
        $mail->isHTML(true);

        $mail->ClearAllRecipients();

        $mail->Subject = $subject;
        foreach ($email as $dt) {
            $mail->AddAddress($dt);
        }

        $mail->msgHTML($message);
        $mail->send();
    }
}