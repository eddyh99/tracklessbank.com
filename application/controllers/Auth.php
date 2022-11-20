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
		$data['title'] = "TracklessBank - Login";

		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect("homepage");
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect("/admin/dashboard");
			}
		}

		$this->load->view('tamplate/header', $data);
		$this->load->view('auth/login');
		$this->load->view('tamplate/footer');
	}

	public function login()
	{
		$data['title'] = "TracklessBank - Login";

		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect("homepage");
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect("/admin/dashboard");
			}
		}

		$this->load->view('tamplate/header', $data);
		$this->load->view('auth/login');
		$this->load->view('tamplate/footer');
	}

	public function signup()
	{
		$data['title'] = "TracklessBank - Signup";

		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect("homepage");
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect("/admin/dashboard");
			}
		}

		$this->load->view('tamplate/header', $data);
		$this->load->view('auth/signup');
		$this->load->view('tamplate/footer');
	}

	public function register()
	{
		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect("homepage");
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect("/admin/dashboard");
			}
		}

		$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
		$userIp = $this->input->ip_address();
		$secret = $this->config->item('google_secret');
		$url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);

		$status = json_decode($output, true);

		if (!$status['success']) {
			$this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
			redirect(base_url() . "auth/signup");
		}

		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('confirmemail', 'Confirm Email', 'trim|required|valid_email|matches[email]');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[9]|max_length[15]');
		$this->form_validation->set_rules('confirmpass', 'Confirm Password', 'trim|required|matches[pass]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
			redirect(base_url() . "auth/signup");
			return;
		}

		$input		= $this->input;
		$email		= $this->security->xss_clean($input->post("email"));
		$pass		= $this->security->xss_clean($input->post("pass"));
		$referral	= $this->security->xss_clean($input->post("referral"));
		$time_location = $this->security->xss_clean($input->post("time_location"));

		if (empty($time_location)) {
			$time_location = "Asia/Singapore";
		}

		$mdata = array(
			'email'     => $email,
			'password'  => $pass,
			'referral'  => $referral,
			'timezone'  => $time_location
		);

		$url = "https://api.tracklessbank.com/v1/auth/register";
		$result = apitrackless($url, json_encode($mdata));
		if ($result->code == 200) {
			//kirim email registrasi

			$subject = "TracklessBank Registration";
			$message = "Thank you for registering on TracklessBank<br><br>
			username : " . $email . "<br>
			password : (your chosen password)<br><br>
			click this <a href='" . base_url("auth/activate?token=") . $result->message->token . "'>link</a> to activate yout account<br><br>
			";

			$this->sendmail($email, $subject, $message);

			$this->session->set_flashdata('success', "<p style='color:black'>You have successfully register</p>");
			redirect(base_url() . "auth/signup_notif");
			return;
		} else {
			$this->session->set_flashdata('failed', $result->message);
			redirect(base_url() . "auth/signup");

			return;
		}
	}

	public function signup_notif()
	{
		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect("homepage");
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect("/admin/dashboard");
			}
		}

		$data['title'] = "TracklessBank - Succes Signup";

		$this->load->view('tamplate/header', $data);
		$this->load->view('auth/signup-notif');
		$this->load->view('tamplate/footer');
	}

	public function activate()
	{
		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect("homepage");
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect("/admin/dashboard");
			}
		}

		$token = $this->security->xss_clean($this->input->get('token'));
		$url = "https://api.tracklessbank.com/v1/auth/activate?token=" . $token;
		$result = apitrackless($url);

		if (!empty(@$result->code == 200)) {
			$this->session->set_flashdata('success', "<p style='color:black'>Activation success</p>");
			redirect(base_url() . "auth/login");
			return;
		} else {
			$this->session->set_flashdata('failed', "<p style='color:black'>" . $result->message . "</p>");
			redirect(base_url() . "auth/login");
			return;
		}
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
			redirect("/admin/dashboard");
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
		redirect('Auth/login');
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