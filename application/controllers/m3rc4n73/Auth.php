<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('user_id')) {
			redirect("m3rc4n73/dashboard");
		}

		$data = array(
			"title"     => "TracklessBank - Login",
			"content"   => "auth/login",
		);

		$this->load->view('tamplate/wrapper', $data);
	}

	public function login()
	{
		if ($this->session->userdata('user_id')) {
			redirect("m3rc4n73/dashboard");
		}

		$data = array(
			"title"     => "TracklessBank - Login",
			"content"   => "auth/login",
		);

		$this->load->view('tamplate/wrapper', $data);
	}

	public function auth_login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', validation_errors());
			redirect(base_url() . "auth/login");
			return;
		}

		$uname = $this->security->xss_clean($this->input->post('email'));
		$pass = $this->security->xss_clean($this->input->post('password'));

		$mdata = array(
			'email' => $uname,
			'password' => sha1($pass)
		);

		$url = "https://api.tracklessbank.com/v1/auth/signin";
		$result = apitrackless($url, json_encode($mdata));
		if (@$result->code != 200) {
			$this->session->set_flashdata('failed', $result->message);
			redirect(base_url() . "auth/login");
			return;
		}

		$userid = $result->message->id;

		$session_data = array(
			'user_id'   => $userid,
			'role'      => $result->message->role,
			'time_location' => $result->message->time_location,
			'currency'  => "USD",
			'symbol'    => "&dollar;"
		);
		$this->session->set_userdata($session_data);
		if ($result->message->role == 'member') {
			$member_session = array(
				'ucode'     => $result->message->ucode,
				'referral'  => $result->message->refcode
			);
			$this->session->set_userdata($member_session);
			redirect("homepage");
		} elseif ($result->message->role == 'admin') {
			$_SESSION["mwallet"] = apitrackless("https://api.tracklessbank.com/v1/admin/user/getMasterwallet")->message->ucode_mwallet;
			redirect("m3rc4n73/dashboard");
		}
	}

	public function forget_pass()
	{
		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect("homepage");
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect("/admin/dashboard");
			}
		}

		$data['title'] = "TracklessBank - Forgot Password";

		$this->load->view('tamplate/header', $data);
		$this->load->view('auth/forget-pass');
		$this->load->view('tamplate/footer');
	}

	public function recovery()
	{
		$token = $this->security->xss_clean($_GET["token"]);
		/*	    $now=time();
	    
	    $result=$this->member->decode_token($token);
	    if (($result[1]+3600000)<$now){
    		$this->session->set_flashdata('failed', "<p style='color:black'>Your reset token has been expired, please try again</p>");
    	    redirect(base_url()."auth/forgotpass");
            return;
	    }
	    
	    $member = $this->member->get_single_by_token($token);
*/
		$this->session->set_flashdata("token", $token);
		redirect(base_url() . "auth/updatepassword");
	}

	public function updatepassword()
	{
		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect("homepage");
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect("admin/dashboard");
			}
		}


		$data['title'] = "TracklessBank - Forgot Password";

		$this->load->view('tamplate/header', $data);
		$this->load->view('auth/forget-pass-2');
		$this->load->view('tamplate/footer');
	}

	public function resetpass()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
			redirect(base_url() . "auth/login");
			return;
		}

		$email = $this->security->xss_clean($this->input->post('email'));
		$url = "https://api.tracklessbank.com/v1/auth/resetpassword?email=" . $email;
		$result = apitrackless($url);
		if (!empty(@$result->code == 200)) {

			$subject = "Reset Password for TracklessBank Account";
			// kirim email forgot password dengan token validasi, lebih dari 1jam expired tokennya
			$message = "Hi,<br><br>

                  Someone has requested a new password for the following account on " . $email . ":<br><br>

                  If you didn't make this request, just ignore this email. If you'd like to proceed:<br><br>

                  <a href='" . base_url() . "auth/recovery?token=" . $result->message->token . "'>Click here to reset your password</a><br><br>

                  Thanks for reading.";

			$this->sendmail($email, $subject, $message);

			$this->session->set_flashdata('failed', "<p style='color:black'>Your password has been reset, please check your email to complete the process</p>");
			redirect(base_url() . "auth/login");
			return;
		} else {
			$this->session->set_flashdata('failed', "<p style='color:black'>" . $result->message . "</p>");
			redirect(base_url() . "auth/login");
			return;
		}
	}

	public function changepass()
	{
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[9]|max_length[15]');
		$this->form_validation->set_rules('confirmpass', 'Confirm Password', 'trim|required|matches[pass]');
		$this->form_validation->set_rules('token', 'Token', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
			redirect(base_url() . "auth/login");
			return;
		}

		$input		= $this->input;
		$pass		= $this->security->xss_clean($input->post("pass"));
		$token		= $this->security->xss_clean($input->post("token"));

		$mdata = array(
			'password'  => sha1($pass),
			'token'     => $token
		);

		$url = "https://api.tracklessbank.com/v1/auth/updatepassword";
		$result = apitrackless($url, json_encode($mdata));
		if ($result->code == 200) {
			$this->session->set_flashdata("success", "Your password is successfully changed");
			redirect(base_url() . "auth/login");
		} else {
			$this->session->set_flashdata("failed", $result->message);
			redirect(base_url() . "auth/forget_pass");
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();

		$this->session->set_flashdata('success', 'You Have been logged out');
		redirect('m3rc4n73');
	}

	public function sendmail($email, $subject, $message)
	{
		$mail = $this->phpmailer_lib->load();

		$mail->isSMTP();
		$mail->Host         = 'mail.freedybank.com';
		$mail->SMTPAuth     = true;
		$mail->Username     = 'no-reply@freedybank.com';
		$mail->Password     = '_v2!~h;x4o$G';
		$mail->SMTPAutoTLS	= false;
		$mail->SMTPSecure	= false;
		$mail->Port			= 587;

		$mail->setFrom('no-reply@freedybank.com', 'FreedyBank');
		$mail->isHTML(true);

		$mail->ClearAllRecipients();


		$mail->Subject = $subject;
		$mail->AddAddress($email);

		$mail->msgHTML($message);
		$mail->send();
	}
}