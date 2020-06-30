<?php
function sentmail($to = null, $subject = null, $mail_body = null)
{



    $CI = &get_instance();

    // $email = base64_decode($email); 

    $config = array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://host2.ruralserver.com',
        'smtp_port' => 465,
        'smtp_user' => 'info@gennextit.com',
        'smtp_pass' => 'COe2Gv_M6AD]',
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        // 'newline' = "\r\n"
    );

    $CI->load->library('email', $config);
    $CI->email->set_newline("\r\n");
    $CI->email->initialize($config);

    $CI->email->from($config['smtp_user']);
    $CI->email->to($to);

    $CI->email->subject($subject);
    $CI->email->message($mail_body);

    $response = $CI->email->send();
    // echo $CI->email->print_debugger();
    // die;

    return ($response) ? true : false;
}
