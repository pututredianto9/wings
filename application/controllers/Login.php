<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
		parent::__construct();		
		$this->load->model('Models');
 
	}

	
	public function index()
	{
		$this->load->view('login');
	}
    public function prosesLogin(){
		 
        $username = $this->input->post('User');
		$password = $this->input->post('Password');
		$where = array(
			'User' => $username,
			'Password' => $password
			);
		$cek = $this->Models->check_credential("Login",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect("Home");
 
		}else{
			echo "Username dan password salah !";
		}
		
	}
    public function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }
}
