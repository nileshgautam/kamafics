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
		// $this->load->view('kmafics/layout/header');
		// $this->load->view('kmafics/index');
		// $this->load->view('kmafics/layout/footer');
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/index2');
		$this->load->view('kmafics/layout/footer2');
	}
	public function aboutus()
	{
		$this->load->view('kmafics/layout/header2');
		// $this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/about-us');
		$this->load->view('kmafics/layout/footer2');	}

	public function whoweare()
	{
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/about-us');
		$this->load->view('kmafics/layout/footer2');
	}
	public function milestone()
	{
		$this->load->view('kmafics/layout/header2');
		// $this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/milestone');
		// $this->load->view('kmafics/pages/milestonenew copy');

		$this->load->view('kmafics/layout/footer2');
	}


	public function Industries($id=null)
	{
		// $id['id']=$id;
		$this->load->view('kmafics/layout/header2');
		// $this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/Industries');
		$this->load->view('kmafics/layout/footer2');
	}

	public function contactus()
	{
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/contact-us');
		$this->load->view('kmafics/layout/footer2');
	}

	// services
	public function indiamarketentry()
	{
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/services/india-market-entry');
		$this->load->view('kmafics/layout/footer2');
	}

	public function jointventures()
	{
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/services/joint-ventures');
		$this->load->view('kmafics/layout/footer2');
	}

	public function legal()
	{
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/services/legal');
		$this->load->view('kmafics/layout/footer2');
	}

	public function peopleoperations()
	{
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/services/people-operations');
		$this->load->view('kmafics/layout/footer2');
	}

	public function technologytransfer()
	{
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/services/technology-transfer');
		$this->load->view('kmafics/layout/footer2');
	}

	public function termcondition()
	{
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/term-condition');
		$this->load->view('kmafics/layout/footer2');
	}

	public function privacypolicy()
	{
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/privacy-policy');
		$this->load->view('kmafics/layout/footer2');
	}

	public function consultingandadvisory()
	{
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/services/consulting-and-advisory');
		$this->load->view('kmafics/layout/footer2');
	}


	// Fourm section start
	public function forum()
	{
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/services/forum/index');
		$this->load->view('kmafics/layout/footer2');
	}

	public function global_categories()
	{
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/forum/global');
		$this->load->view('kmafics/layout/footer2');
	}
	
	public function work()
	{
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/forum/work');
		$this->load->view('kmafics/layout/footer2');
	}

	public function technology()
	{
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/forum/technology');
		$this->load->view('kmafics/layout/footer2');
	}

	public function workaftercovid19()
	{
		$this->load->view('kmafics/layout/header2');
		$this->load->view('kmafics/pages/forum/work-after-covid-19');
		$this->load->view('kmafics/layout/footer2');
	}

	// Fourm section end

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
			//Sending email
			$this->load->helper('email');
			$mail = sentmail($email, $subject, $message);

			if ($mail) {
				echo json_encode(array('message' => 'Thank you for contacting with us!, our expert will contact you shortly.', 'type' => 'success'), true);
			} else {
				echo json_encode(array('message' =>'Opps somting went wrong! try again', 'type' => 'error'), true);
			}
		}
		//    redirect(__CLASS__.'/index');
	}
}
