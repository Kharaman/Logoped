<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->output->enable_profiler(TRUE);
		$this->load->library('ion_auth');
		$this->load->view('index');
	}
}
