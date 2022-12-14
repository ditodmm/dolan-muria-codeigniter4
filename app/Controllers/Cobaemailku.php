<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Cobaemailku extends Controller
{
	public function __construct()
	{
		$this->email = \Config\Services::email();
	}

    
    public function index(){
        
        $this->email->setFrom('shoyo3232@gmail.com','Admin');
		$this->email->setTo('ditorifqi32@gmail.com');

		$this->email->setSubject("title");
		$this->email->setMessage("message");

		if(! $this->email->send()){
			return false;
		show_error($this->email->print_debugger());
		}else{
			return true;
			show_error($this->email->print_debugger());
		}
    }

    
}