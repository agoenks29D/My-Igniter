<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	/**
	 * default codeigniter
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	/**
	 * display view with twig
	 */
	public function twig()
	{
		$data['elapsed_time'] = $this->benchmark->elapsed_time();
		$data['subtitle'] = 'MY Igniter (Codeigniter + Twig)';
		$this->load->twig('welcome_twig',$data);
	}

	/**
	 * display view with react
	 */
	public function react()
	{
		$data['elapsed_time'] = $this->benchmark->elapsed_time();
		$data['subtitle'] = 'MY Igniter (Codeigniter + Twig + React)';
		$this->load->twig('welcome_react',$data);
	}
}