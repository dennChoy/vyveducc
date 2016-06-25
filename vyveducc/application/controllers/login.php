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
		$data['accion'] = base_url('index.php/login/validar');
		$data['Mensaje'] = '';	
		$this->load->view('login', $data);
	}

	function home()
	{
		if($this->session->userdata('ID_USUARIO'))
		{
			$data['cuerpo'] = 'inicio/index';
        	$data['username']= $this->session->userdata('NOMBRE_USUARIO');   
			$this->load->view('header', $data);
		}else {
			redirect(site_url());
		}				
	}

	function validar()
	{	 

		if(isset($_POST['password_v'])){
			$this->load->model('login_model');
			if($this->login_model->log($_POST['username_v'], $_POST['password_v'])){
				$user = json_decode(json_encode($this->login_model->log($_POST['username_v'], $_POST['password_v'])), True);
				$this->session->set_userdata($user);
				$data['cuerpo'] = 'inicio/index';
        		$data['username']= $this->session->userdata('NOMBRE_USUARIO');   
				$this->load->view('header', $data);
				
			}else{
				$this->load->helper('form');
				$data['Mensaje'] = 'Usuario o Contrasena incorreta';	
				$data['accion'] = base_url('index.php/login/validar');
				$this->load->view('login', $data);
			}
		}
		

	}

	function logout()
		{
			$this->session->sess_destroy();
			//echo 'hola';
			redirect('login');
		}


}
?>