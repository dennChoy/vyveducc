<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function _construct()
	{
		parent::_construct();
		$this->load->helper('form');

	}

	function index()
	{
		$this->load->helper('form');
		$data['Mensaje'] = '';	
		$this->load->view('login', $data);
	}

	function home()
	{
		if($this->session->userdata('ID_USUARIO'))
		{
			$data['cuerpo'] = 'index/index';
        	$data['username']= $this->session->userdata('NOMBRE_USUARIO');   
			$this->load->view('header', $data);
		}else {
			redirect(site_url());
		}
		//$data['cuerpo'] = 'index/index';
        //$data['username']= $this->session->userdata('ID_USUARIO');   
		//$this->load->view('header', $data);
				
	}

	function iniciosesion()
	{	 
		/*
		$this->load->model('login_model');
		$this->load->helper('form');
		$data['Mensaje'] = json_decode(json_encode($this->login_model->log($_POST['username_v'], $_POST['password_v'])), True);
		$this->load->view('login', $data);
		*/
		

		if(isset($_POST['password_v'])){
			$this->load->model('login_model');
			if($this->login_model->log($_POST['username_v'], $_POST['password_v'])){
				$user = json_decode(json_encode($this->login_model->log($_POST['username_v'], $_POST['password_v'])), True);
				$this->session->set_userdata($user);
				$data['cuerpo'] = 'index/index';
        		$data['username']= $this->session->userdata('NOMBRE_USUARIO');   
				$this->load->view('header', $data);
				
			}else{
				$this->load->helper('form');
				$data['Mensaje'] = 'Ususario o contrasena incorrecto';
				$this->load->view('login', $data);
				
			}
		}
		

	}

	function logout()
		{
			$this->session->sess_destroy();
			//echo 'hola';
			redirect();
		}


}
?>