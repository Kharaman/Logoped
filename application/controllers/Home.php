<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if ($this->ion_auth->logged_in())
		{
			$view['title'] = 'Logoped';
			$this->load->view('header', $view);
			$this->load->view('index');
			$this->load->view('footer');
		}
		else
		{
			redirect('/auth/login');
			exit;
		}

	}
}
