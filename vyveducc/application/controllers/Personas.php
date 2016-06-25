<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personas extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
		if (! $this->session->userdata('NOMBRE_USUARIO')) 
		{
			 redirect('login');
		}     
	}

	public function index()
	{
		$this->datos['username']= $this->session->userdata('NOMBRE_USUARIO');   
		$this->load->model('personas_model');
		$data['segmento'] = $this->uri->segment(3);//se puede cambiar el 3
		if (!$data['segmento'])
			{
				$this->datos['personas'] = $this->personas_model->obtenerDatos();
			}else
			{
				$this->datos['personas'] = $this->personas_model->obtenerDato($data['segmento']);
			}

		$this->datos['funcion'] = $this->personas_model->getFuncion();
		$this->datos['cuerpo'] = 'personas/inicio'; //Carga una vista
		$this->load->view('header', $this->datos);

	}

	function editarpersona($id = '')
	{
		$this->datos['username']= $this->session->userdata('NOMBRE_USUARIO');   
		$this->load->model('personas_model');
		$this->load->helper('form');
    	if (!empty($id)) 
    	{
    		$personas = $this->personas_model->obtenerDato($id);
    		if ($personas) 
    		{
    			$this->datos['personas'] = $personas;
    		}

    	$this->datos['funcionAlumno'] = $this->personas_model->getFuncionAlumno();
		$this->datos['funcionEncargado'] = $this->personas_model->getFuncionEncargado();
		$this->datos['sexo'] = $this->personas_model->getSexo();
		$this->datos['cuerpo'] = 'personas/editar'; //Carga una vista
		$this->load->view('header', $this->datos);
    	}
	}


	function guardarpersona()
	{
		if($this->session->userdata('ROL_USUARIO') != 1)
		{
			echo "NO TIENE PERMISOS PARA REALIZAR LA ACCION";
		}else
		{
			$data = array(
				'nombres' => $this->input->post('nombres'), 
				'apellidos'=> $this->input->post('apellidos'),
				//'fecha_nacimientoo'=> $this->input->post('fecha_nacimiento'),
				'fecha_nacimiento' => date('Y-m-d', strtotime($this->input->post('fecha_nacimiento'))),
				'sexo'=> $this->input->post('sexo'),
				'num_telefono'=> $this->input->post('telefono'),
				'direccion'=> $this->input->post('direccion'),
				'funcion_educ_cristiana'=> $this->input->post('funcion_persona'),
				'grado_escolar'=> $this->input->post('grado_academico'),
				'observaciones'=> $this->input->post('observaciones'),
				);
			$this->load->model('Personas_model');
			$id = $this->uri->segment(3);
			if ($id > 0)
			{
				//Acutaliza los datos segun el $id
				$this->Personas_model->actualizarDato($id,$data);
				//echo "Actualizando";
			}elseif($id == 0)
			{
				//Funcion de guardar
				$this->Personas_model->insertaDato($data);
				//echo "Guardando";
			}
			
			redirect(base_url('index.php/personas'));
		}

	}


	 function eliminarpersona()
    {
    	if($this->session->userdata('ROL_USUARIO') != 1)
    	{
			echo "NO TIENE PERMISOS PARA REALIZAR LA ACCION";
		}else
		{
	    	$this->load->model('personas_model');
	    	$id = $this->uri->segment(3);
	    	$this->personas_model->eliminar($id);
	    	redirect(base_url('index.php/personas'));
	    }
    }

    function nuevoalumno()
    {
    	$datos['username']= $this->session->userdata('NOMBRE_USUARIO');   
    	$this->load->helper('form');

    	$this->load->model('personas_model');	
    	$datos['funcionAlumno'] = $this->personas_model->getFuncionAlumno();
    	$datos['cuerpo'] = 'personas/nuevoalumno';
    	$this->load->view('header', $datos);

    }


    function nuevoadulto()
    {
    	$datos['username']= $this->session->userdata('NOMBRE_USUARIO');   
    	$this->load->helper('form');

    	$this->load->model('personas_model');	
    	$datos['funcionEncargado'] = $this->personas_model->getFuncionEncargado();
    	$datos['cuerpo'] = 'personas/nuevoadulto';
    	$this->load->view('header', $datos);

    }

    function buscar()
    {
		
    	$this->load->model('personas_model');
        $datos = array(
        	'personas' => $this->personas_model->Buscar(),
        	'username' => $this->session->userdata('NOMBRE_USUARIO') 		
        	);
        $datos['cuerpo'] = 'personas/inicio';
         //print_r($datos);
         $this->load->view('header', $datos);
        
    }


}
?>