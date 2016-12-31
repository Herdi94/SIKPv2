<?php

/**
* 
*/
class Email extends CI_Controller
{

	function index()
	{


		function _construct()
		{
			$this->load->library('email');

			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$this->email->initialize($config);

		}





		/*
        to configuration sending email via localhost




                $config = array(
        'protocol'=>'smtp',
        'smtp_host'=> 'ssl://smtp.gmail.com',
        'smtp_port'=> 465,
        'smtp_user'=> 'dfikr94@gmail.com',
        'smtp_pass'=> 'Axis0945',
                    );


                $this->load->library('email', $config);
        */
		/*
                $this->load->library('email','email.php/$config');
                $this->email->set_newline("\r\n");

                $this->email->from('l_fiqri94@ymail.com','Herdi Zulfiqri');
                $this->email->to('dfikr94@gmail.com');
                $this->email->subject('This is an email test');

                $msg = 'www.facebook.com';
                $this->email->message($msg);

                //attachments
                $path = $this->config->item('server_root');
                //$file = $path.'/sikp/attachments/yourinfo.txt';

                //$this->email->attach($file);


                if($this->email->send())
                {

                    echo 'Your email was sent, fool.';
                }
                else
                {
                    show_error($this->email->print_debugger());
                }


                }
        */

		$this->load->library('email');
		$this->email->from('dzulfikri_TI@yahoo.com');
		$this->email->to('l_fiqri94@ymail.com');
        $msg =  'http://localhost/sikp/pengaju/welcome/konfirmasi';



		$this->email->subject('Email Test');
		$this->email->message($msg);

		if($this->email->send()){
			echo 'Email berhasil dikirim';
		}
		else {
			show_error($this->email->print_debugger());
		}

	}
}

?>