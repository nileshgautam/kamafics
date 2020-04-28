<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControlUnit extends CI_Controller
{

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

	public function termcondition()
	{
		$this->load->view('kamafics/layout/header');
		$this->load->view('kamafics/pages/term-condition');
		$this->load->view('kamafics/layout/footer');
	}

	public function privacypolicy()
	{
		$this->load->view('kamafics/layout/header');
		$this->load->view('kamafics/pages/privacy-policy');
		$this->load->view('kamafics/layout/footer');
	}



	// user registration
	public function postcontactDetails()
	{
		// print_r($_POST);
		// die;

		if (!empty($_POST)) {
			$name = $this->input->post('username');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$subject = $this->input->post('subject');
			$textmessage = $this->input->post('message');
			//generate simple random code
			$user['name'] = $name;
			$user['phone'] = $phone;
			$user['subject'] = $subject;
			$user['messages'] = $textmessage;
			$user['email'] = $email;
			$id = $this->CustomModel->insert($user);
			//set up email
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => SMTPHOSTNAME,
				'smtp_port' => '465',
				'smtp_user' => SENDEREMAIL, // change it to yours
				'smtp_pass' => SENDERPASSWORD, // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);
			$message =     "
		   <html>
		   <head>
			   <title>Lead from website</title>
		   </head>
		   <body>
			   <h2>Customer details</h2>
			   <p>Name: .$name.</p>
			   <p>Email: " . $email . "</p>
			   <p>Phone number: " . $phone . "</p>
			   <p>Subject: " . $subject . "</p>
			   <p>Message: " . $textmessage . "</p>
			   <p>Contact Now</p>
		   </body>
		   </html>
		   ";

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($config['smtp_user']);
			$this->email->to(reciver);
			$this->email->subject('noreply @ Lead from Website');
			$this->email->message($message);

			//sending email
			if ($this->email->send()) {
				echo json_encode(array('message' => 'Thank you for contacting us, our expert will call you shortly.', 'type' => 'success'), true);
			} else {
				echo json_encode(array('message' => $this->email->print_debugger(), 'type' => 'error'), true);
			}
		}

		//    redirect(__CLASS__.'/index');
	}
}
