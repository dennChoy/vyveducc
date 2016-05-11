<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_personas extends CI_Controller 
{
	function _construct()
	{
		parent::_construct();

	}

	function index()
	{
		$this->load->helper('form');
		$this->datos['username']= $this->session->userdata('NOMBRE_USUARIO');   
		$this->load->model('tipopersonas_model');
		$data['segmento'] = $this->uri->segment(3);//se puede cambiar el 3
		if (!$data['segmento'])
			{
				$this->datos['funcion'] = $this->tipopersonas_model->obtenerDatos();
			}else
			{
				$this->datos['funcion'] = $this->tipopersonas_model->obtenerDato($data['segmento']);
			}

		$this->datos['cuerpo'] = 'tipo_personas/index_tipo_personas';
		$this->load->view('header', $this->datos);
		//$this->load->view('tipo_personas/index_tipo_personas', $data);
	
	}

	function agregarnuevo()
	{
		$this->datos['username']= $this->session->userdata('NOMBRE_USUARIO');   
		$this->load->helper('form');	
		$this->load->view('header');
		$this->load->view('control_personas/agregar_persona');

	}

	function guardartipopersona()
	{
		$data = array(
			'NOMBRE_FUNCION' => $this->input->post('tipo_nuevo'), 
			'descripcion_funcion'=> $this->input->post('descripcion_nuevo'),
			'alumno' => $this->input->post('corresponde')
			);
		$this->load->model('tipopersonas_model');
		$this->tipopersonas_model->insertaDato($data);
		redirect(base_url('tipo_personas'));

	}

	function editar($id = '')
	{
		$this->datos['username']= $this->session->userdata('username');   
		$this->load->helper('form');
		$this->load->model('tipopersonas_model');
		$data['segmento'] = $this->uri->segment(3);//se puede cambiar el 3
		if ($data['segmento'])
			{
				$this->datos['funcion'] = $this->tipopersonas_model->obtenerDato($data['segmento']);
			}
		$this->datos['cuerpo'] = 'tipo_personas/index_tipo_personas';
		$this->load->view('header', $this->datos);
	}

	function editartipopersona()
	{
	/*nombre IGUAL en la base de datos => nombre IGUAL de la vista
		Si el nombre que esta aqui no es el mismo en la base de datos 
		devovlera un error y mostrara el query que se esta mostrando,
		Si el nombre que viene del input esta mal, y el nombre de la base de datos
		esta bien se insertara o actualizara como NULL		
			*/
		$data = array(
			'NOMBRE_FUNCION' => $this->input->post('NOMBRE_FUNCION'), 
			'DESCRIPCION_FUNCION'=> $this->input->post('DESCRIPCION_FUNCION'),
			'ALUMNO' => $this->input->post('corresponde')
			);

		$this->load->model('tipopersonas_model');
		$id = $this->uri->segment(3);
		$this->tipopersonas_model->actualizarDato($id,$data);
		redirect(base_url('tipo_personas'));

	}

	 function eliminar()
    {
    	$this->load->model('tipopersonas_model');
    	$id = $this->uri->segment(3);
    	$this->tipopersonas_model->eliminar($id);
    	redirect(base_url('tipo_personas'));
    }


}
?>