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
            "mn_member" => "active",
            "extra"     => "admin/member/js/js_member"
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function get_all()
    {
        $mdata = array(
            "timezone"  => $_SESSION["time_location"]
        );
        $result = apitrackless("https://api.tracklessbank.com/v1/admin/member/getAll", json_encode($mdata));
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
        $result = apitrackless("https://api.tracklessbank.com/v1/admin/member/setMember?status=activate&userid=" . $id);
        if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('admin/member');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('admin/member');
        }
    }

    public function enabled($id)
    {
        $id = $this->security->xss_clean($id);
        $result = apitrackless("https://api.tracklessbank.com/v1/admin/member/setMember?status=enabled&userid=" . $id);
        if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('admin/member');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('admin/member');
        }
    }

    public function disabled($id)
    {
        $id = $this->security->xss_clean($id);
        $result = apitrackless("https://api.tracklessbank.com/v1/admin/member/setMember?status=disabled&userid=" . $id);
        if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('admin/member');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('admin/member');
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
}