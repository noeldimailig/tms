
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Pages extends Controller {
	public function index() {
		$this->call->view('index');
	}

	public function about() {
		$this->call->view('aboutus');
	}

    public function contact() {
		$this->call->view('contact');
	}

	// User account page handlers
	public function login() {
		$this->call->view('login');
	}

	public function signup() {
		$this->call->view('signup');
	}

	public function google_account_access() {
		$this->call->view('google_account');
	}

	public function choose() {
		$this->call->view('choose_account');
	}

	public function student() {
		$this->call->view('student_signup');
	}

	public function teacher() {
		$this->call->view('teacher_signup');
	}

	public function staff() {
		$this->call->view('staff_signup');
	}

	public function verify() {
		$this->call->view('verify');
	}

	public function forgot() {
		$this->call->view('forgot_password');
	}

}
?>
