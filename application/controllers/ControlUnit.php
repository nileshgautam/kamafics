<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlUnit extends CI_Controller {

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
	public function index()
	{
		$this->load->view('kamafics/layout/header');
		$this->load->view('kamafics/index');
		$this->load->view('kamafics/layout/footer');

	}
	public function aboutus()
	{
		$this->load->view('kamafics/layout/header');
		$this->load->view('kamafics/pages/about-us');
		$this->load->view('kamafics/layout/footer');

	}

	public function whoweare()
	{
		$this->load->view('kamafics/layout/header');
		$this->load->view('kamafics/pages/about-us');
		$this->load->view('kamafics/layout/footer');
	}
	public function milestone()
	{
		$this->load->view('kamafics/layout/header');
		$this->load->view('kamafics/pages/milestone');
		$this->load->view('kamafics/layout/footer');
	}

	
	public function Industries()
	{
		$this->load->view('kamafics/layout/header');
		$this->load->view('kamafics/pages/Industries');
		$this->load->view('kamafics/layout/footer');

	}

	public function contactus()
	{
		$this->load->view('kamafics/layout/header');
		$this->load->view('kamafics/pages/contact-us');
		$this->load->view('kamafics/layout/footer');

	}

	// services
	public function indiamarketentry()
	{
		$this->load->view('kamafics/layout/header');
		$this->load->view('kamafics/pages/services/india-market-entry');
		$this->load->view('kamafics/layout/footer');

	}

	public function jointventures()
	{
		$this->load->view('kamafics/layout/header');
		$this->load->view('kamafics/pages/services/joint-ventures');
		$this->load->view('kamafics/layout/footer');

	}

	public function legal()
	{
		$this->load->view('kamafics/layout/header');
		$this->load->view('kamafics/pages/services/legal');
		$this->load->view('kamafics/layout/footer');

	}

	public function peopleoperations()
	{
		$this->load->view('kamafics/layout/header');
		$this->load->view('kamafics/pages/services/people-operations');
		$this->load->view('kamafics/layout/footer');

	}

	public function technologytransfer()
	{
		$this->load->view('kamafics/layout/header');
		$this->load->view('kamafics/pages/services/technology-transfer');
		$this->load->view('kamafics/layout/footer');

	}

}
