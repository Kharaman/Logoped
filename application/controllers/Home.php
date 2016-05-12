<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if ($this->ion_auth->logged_in())
		{
			$this->load->view('index');
		}
		else
		{
			redirect('/auth/login');
			exit;
		}

	}
}
