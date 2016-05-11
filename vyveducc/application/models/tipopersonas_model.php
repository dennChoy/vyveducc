<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipopersonas_model extends CI_Model
{
	function _construct()
	{
		parent::_construct();
		$this->load->database();
	}

	function obtenerDatos()
	{
		$this->db->order_by('ALUMNO', 'desc'); 
		$query = $this->db->get('funcion_educ_cristiana');
		if($query -> num_rows() > 0) return $query;
		else return false;
	}

	function obtenerDato($id)
	{

		$this->db->where('ID_FUNCION', $id);
		$query = $this->db->get('funcion_educ_cristiana');
		if($query -> num_rows() > 0) return $query;
		else return false;
	}

	function insertaDato($data)
	{
		$this->db->insert('funcion_educ_cristiana',$data);
		/*$this->db->insert('DATO_PERSONAL', array(
			'NOMBRES'=>$data['nombres'], 
			'APELLIDOS'=>$data['apellidos'],
			'FECHA_NACIMIENTO'=>$data['fecha_nacimiento'],
			'SEXO'=>$data['sexo'],
			'NUM_TELEFONO'=>$data['num_telefono'],
			'DIRECCION'=>$data['direccion'],
			'TIPO_PERSONA' => $data['tipo_persona']));
		*/	
	}

	function actualizarDato($id, $datos)
	{
		//$this->db->set($datos);
		$this->db->where('ID_FUNCION', $id);
		$this->db->update('funcion_educ_cristiana', $datos);
	}
	function eliminar($id)
	{
		$this->db->delete('funcion_educ_cristiana', array('ID_FUNCION'=>$id));
	}

}