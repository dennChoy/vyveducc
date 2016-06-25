<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
		if (! $this->session->userdata('NOMBRE_USUARIO')) 
		{
			 redirect('login');
		}else{
			$this->load->model('registro_model');
		}
	}

	function buscarinscritos()
	{
		$this->datos['username']= $this->session->userdata('NOMBRE_USUARIO');   
		$this->load->model('registro_model');
		$this->load->helper('form');
		$this->datos['actividad'] = $this->registro_model->getActividades();
		$this->datos['cuerpo'] = 'actividades/buscar_asistente';
		$this->load->view('header', $this->datos);
	}


	function inscribir()
	{
		$this->datos['username']= $this->session->userdata('NOMBRE_USUARIO');   
		$this->load->model('registro_model');
		$this->load->helper('form');
		$this->datos['actividad'] = $this->registro_model->getActividades();
		$this->datos['cuerpo'] = 'actividades/buscar_participante';
		$this->load->view('header', $this->datos);

	}
	function verparticipantes()
	{
		$this->load->model('registro_model');
        $datos = $this->input->get('actividad');
       // echo "La actividad es ".$datos;
		$this->datos = array(
				'username'	 => $this->session->userdata('NOMBRE_USUARIO'),
				'asistentes' => $this->registro_model->getAsistentes($datos),
				'cuerpo'	 => 'actividades/inscripcion',
				'buscar'	 => 'actividades/buscar_participante',
				'actividad'  => $this->registro_model->getActividades(),
				'nactividad' => $this->registro_model->getActividad($datos),
				'totalPersonas' => $this->registro_model->getTotalInscritos($datos),

			);               

		$this->load->view('header', $this->datos);
	}
	function verasistentes()
	{
		$this->load->model('registro_model');
        $datos = $this->input->get('actividad');
       // echo "La actividad es ".$datos;
		$this->datos = array(
				'username'	 => $this->session->userdata('NOMBRE_USUARIO'),
				'asistentes' => $this->registro_model->getInscritos($datos),
				'cuerpo'	 => 'actividades/registro_index',
				'buscar'	 => 'actividades/buscar_asistente',
				'actividad'  => $this->registro_model->getActividades(),
				'nactividad' => $this->registro_model->getActividad($datos),
				'totalPersonas' => $this->registro_model->getTotalInscritos($datos),

			);               

		$this->load->view('header', $this->datos);
		
	}

	//Crea el formulario para realizar una inscripcion
	function inscripcion()
	{
		$this->load->model('registro_model');
		$this->load->model('personas_model');
		$this->load->helper('form');
		$id = $this->uri->segment(3);//se puede cambiar el
		$uid = $_GET['actividad'];
		$this->datos['actividad'] = $this->registro_model->getActividades();
			$this->datos = array(
				'username'	 => $this->session->userdata('NOMBRE_USUARIO'),
				'cuerpo'	 => 'actividades/forminscripcion',
				'datopersonal'  => $this->personas_model->obtenerdato($id),
				'nactividad' => $this->registro_model->getActividad($uid),
				'accion'	 => base_url('index.php/registro/realizarinscripcion'),
			);               

		$this->load->view('header', $this->datos);
		
	}

	function verpermiso()
	{
		$id = $this->uri->segment(3);//se puede cambiar el
		$uid = $_GET['actividad'];
		$this->datos = array(
				'username'	 => $this->session->userdata('NOMBRE_USUARIO'),
				'cuerpo'	 => 'actividades/verpermiso',
				'datopersonal' =>  $this->registro_model->getPermiso($id, $uid),
				'frmeditp'	=> base_url('index.php/personas/editarpersona/'.$id),
				'accion_editarins' => base_url('inscripcion/'.$id.'?actividad='.$uid),

			);
		$this->load->view('header', $this->datos);	
	}
	//formulario para realizar pago
	function pago()
	{
		$this->load->model('personas_model');
		$this->load->helper('form');
		$id = $this->uri->segment(3);//se puede cambiar el
		$uid = $_GET['actividad'];
		$historialp = $this->registro_model->getPermiso($id, $uid);
		$this->datos['actividad'] = $this->registro_model->getActividades();
			$this->datos = array(
				'username'	 => $this->session->userdata('NOMBRE_USUARIO'),
				'cuerpo'	 => 'actividades/formpago',
				'datopersonal'  => $this->personas_model->obtenerdato($id),
				'nactividad' => $this->registro_model->getActividad($uid),
				'permiso'	 => $this->registro_model->getPermiso($id, $uid),
				'accion'	 => base_url('index.php/registro/realizarpago'),
				'historial'  => $this->registro_model->getHistorialPago($historialp[0]->ID_PERMISO),
			);               

		$this->load->view('header', $this->datos);
		
	}

//recibe los datos del formulario y realiza el pago
	function realizarpago()
	{
	
		$data = array(
			'ID_PERMISO'=> $this->input->post('permiso'),
			'REF_FISICA' 	=> $this->input->post('recibo'), 
			'CANTIDAD'=> $this->input->post('cantidad'),
			'FECHA_PAGO' => date('Y-m-d', strtotime($this->input->post('fecha'))),
			);
		$this->load->model('registro_model');	
		$this->registro_model->realizarpago($data);
	}

	function realizarinscripcion()
	{
		$data = array(
			'ENCARGADO1' 	=> $this->input->post('encargado1'),
			'ENCARGADO2'	=> $this->input->post('encargado2'),
			'DPI1'			=> $this->input->post('dpi1'),
			'DPI2'			=> $this->input->post('dpi2'),
			'TELEFONO1'		=> $this->input->post('telefono1'),
			'TELEFONO2'		=> $this->input->post('telefono2'),
			'OBSERVACIONES_PERMISO' => $this->input->post('observaciones'),
			'ID_DATO_PERSONAL'=> $this->input->post('id_persona'),
			'ID_ACTIVIDAD'	=> $this->input->post('id_actividad'),

			);
		$this->load->model('registro_model');
		$this->registro_model->realizarinscripcion($data);
	}

}