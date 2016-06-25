<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		if (! $this->session->userdata('NOMBRE_USUARIO')) 
		{
			 redirect('login');
		}     
	}

	function index()
	{
		if($this->session->userdata('ROL_USUARIO') != 1){
			redirect('login/home');
		}
		$this->load->helper('form');
		$datos['username']= $this->session->userdata('NOMBRE_USUARIO');   
		$this->load->model('usuarios_model');
		$data['segmento'] = $this->uri->segment(3);//se puede cambiar el 3
		if (!$data['segmento'])
			{
				$datos['usuario'] = $this->usuarios_model->obtenerDatos();
			}else
			{
				$datos['usuario'] = $this->usuarios->obtenerDato($data['segmento']);
			}

			$datos['rol'] = $this->usuarios_model->obtenerRoles();
		$datos['cuerpo'] = 'usuarios/usuarios';
		$this->load->view('header', $datos);
		//$this->load->view('tipo_personas/index_tipo_personas', $data);
	
	}


	function gestion($id='')
	{
		$this->datos['username']= $this->session->userdata('NOMBRE_USUARIO');   
		$this->load->model('usuarios_model');
		$this->load->helper('form');
		$this->datos['rol'] = $this->usuarios_model->getRol();

    	if (!empty($id)) 
    	{
    		$usuario = $this->usuarios_model->obtenerDato($id);
    		if ($usuario) 
    		{
    			$this->datos['usuario'] = $usuario;
    		}
			$this->datos['cuerpo'] = 'usuarios/guardar'; //Carga una vista
			$this->load->view('header', $this->datos);

    	}else{
    		$this->datos['cuerpo'] = 'usuarios/guardar'; //Carga una vista
			$this->load->view('header', $this->datos);
    	}
	}

	function guardarusuario()
	{
		$data = array( 
			'NOMBRE_USUARIO'=> $this->input->post('username'),
			'PASSWORD' => $this->input->post('pass'),
			'PERTENECE'=> $this->input->post('asignado'),
			'ROL_USUARIO'=> $this->input->post('rol'),
			);
		$this->load->model('usuarios_model');
		$id = $this->uri->segment(3);
		if ($id > 0)
		{
			$this->usuarios_model->actualizaUsuario($id,$data);
		}elseif($id == 0)
		{
			$this->usuarios_model->insertaUsuario($data);
		}
		
		redirect(base_url('index.php/usuarios'));
	}
	function roles($id='')
	{
		$this->datos['username']= $this->session->userdata('NOMBRE_USUARIO');   
		$this->load->model('usuarios_model');
		$this->load->helper('form');
    	if (!empty($id)) 
    	{
    		$rol = $this->usuarios_model->obtenerRol($id);
    		if ($rol) 
    		{
    			$this->datos['rol'] = $rol;
    		}
			$this->datos['cuerpo'] = 'usuarios/roles'; //Carga una vista
			$this->load->view('header', $this->datos);

    	}else{
    		$this->datos['cuerpo'] = 'usuarios/roles'; //Carga una vista
			$this->load->view('header', $this->datos);
    	}
		
	}

	function guardaRol()
	{
		$data = array( 
			'NOMBRE_TIPO'=> $this->input->post('nombre_rol'),
			'DESCRIPCION' => $this->input->post('descripcion'),
			);
		$this->load->model('usuarios_model');
		$id = $this->uri->segment(3);
		if ($id > 0)
		{
			$this->usuarios_model->actualizaRol($id,$data);
		}elseif($id == 0)
		{
			$this->usuarios_model->insertaRol($data);
		}
		
		redirect(base_url('index.php/usuarios'));
	}
	function eliminarUsuario()
    {
    	$this->load->model('usuarios_model');
    	$id = $this->uri->segment(3);
    	$this->usuarios_model->eliminaUsuario($id);
    	redirect(base_url('index.php/usuarios'));
    }

    function eliminarRol()
    {
    	$this->load->model('usuarios_model');
    	$id = $this->uri->segment(3);
    	$this->usuarios_model->eliminaRol($id);
    	redirect(base_url('index.php/usuarios'));
    }
}
?>