<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Personas_model extends CI_Model
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
		if($query -> num_rows() > 0) return $query->result();
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
		if($query -> num_rows() > 0) return $query->result();
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
        return $query->result_array();
    }

    function getFuncionEncargado()
    {
   		$query = $this->db->query('select ID_FUNCION, NOMBRE_FUNCION from funcion_educ_cristiana where ALUMNO !=1;');
        return $query->result_array();
    }

     function getFuncion()
    {
    	$this->db->select('*');
    	$this->db->from('funcion_educ_cristiana');
    	$query = $this->db->get();
    	if($query -> num_rows() > 0) return $query->result();
    	else return false;
    }


    function getSexo()
    {
    	$query = $this->db->query('select sexo from dato_personal');
    	return $query->result();
    }

    function Buscar()
    {
    	/*
    	$where = array();

        $limite = 20;
        $inicio = 0;

        if ($this->input->get('limite')) { $limite = $this->input->get('limite'); }
        if ($this->input->get('inicio')) { $inicio = $this->input->get('inicio'); }
        if ($this->input->get('nombre')) { 
            $nombre = $this->input->get('nombre');
            $where["(nombres LIKE '%{$nombre}%' or apellidos LIKE '%{$nombre}%')"] = null; 
        }
           // $this->db->order_by('fecha','ASC');
           return $this->db->get_where('dato_personal ', $where, $limite, $inicio)->result();
         */


        $where = array();
        $this->db->select("*, DATE_FORMAT(dato_personal.FECHA_NACIMIENTO, '%d-%m-%Y') as FECHA_MODIFICADA ");
		$this->db->from('dato_personal');
		$this->db->join('funcion_educ_cristiana','dato_personal.FUNCION_EDUC_CRISTIANA = funcion_educ_cristiana.ID_FUNCION', 'left');

		if ($this->input->get('nombre')) { 
            $nombre = $this->input->get('nombre');
            $this->db->like('apellidos',$nombre);
            $this->db->or_like('nombres',$nombre);
            //$where["(nombres LIKE '%{$nombre}%' or apellidos LIKE '%{$nombre}%')"] = null; 
        }
	
		$query=$this->db->get();
		//$data= $query->result_array();
		if($query -> num_rows() > 0) return $query->result();
		else return false;
    }

}
?>