<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Asistentes_model extends CI_Model
{
	function _construct()
	{
		parent::_construct();
		$this->load->database();
	}

	function obtenerDatos()
	{
		//$query = $this->db->get('DATO_PERSONAL');
		$this->db->select("*, DATE_FORMAT(dato_personal.FECHA_NACIMIENTO, '%d-%m-%Y') as FECHA_MODIFICADA ");
		$this->db->from('dato_personal');
		$this->db->join('funcion_educ_cristiana', 'dato_personal.FUNCION_EDUC_CRISTIANA = funcion_educ_cristiana.ID_FUNCION', 'left');
		$this->db->order_by('FUNCION_EDUC_CRISTIANA', 'ASC'); 
		$this->db->order_by('FECHA_NACIMIENTO', 'DESC'); 
		$query = $this->db->get();
		if($query -> num_rows() > 0) return $query;
		else return false;
	}

	function obtenerDato($id)
	{
		$this->db->select("*, DATE_FORMAT(dato_personal.FECHA_NACIMIENTO, '%d-%m-%Y') as FECHA_MODIFICADA ");
		$this->db->from('dato_personal');
		$this->db->join('funcion_educ_cristiana','dato_personal.FUNCION_EDUC_CRISTIANA = funcion_educ_cristiana.ID_FUNCION', 'left');
		$this->db->where('ID_PERSONA',$id);
		$query=$this->db->get();
		//$data= $query->result_array();
		if($query -> num_rows() > 0) return $query;
		else return false;
	}
	

	function insertaDato($data)
	{
		$this->db->insert('DATO_PERSONAL',$data);
	}


	function actualizarDato($id, $data)
	{
		$this->db->where('ID_PERSONA', $id);
		$this->db->update('DATO_PERSONAL', $data);
	}

	function eliminar($id)
	{
		$this->db->delete('DATO_PERSONAL', array('ID_PERSONA'=>$id));
	}


 	function getFuncionAlumno()
    {
   		$query = $this->db->query('select ID_FUNCION, NOMBRE_FUNCION from funcion_educ_cristiana where ALUMNO =1;');
        return $query->result();
    }

    function getFuncionEncargado()
    {
   		$query = $this->db->query('select ID_FUNCION, NOMBRE_FUNCION from funcion_educ_cristiana where ALUMNO !=1;');
        return $query->result();
    }

    function getSexo()
    {
    	$query = $this->db->query('SELECT SEXO FROM DATO_PERSONAL');
    	return $query->result();
    }

}
?>