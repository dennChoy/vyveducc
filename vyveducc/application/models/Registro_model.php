<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_model extends CI_Model
{
	function _construct()
	{
		parent::_construct();
	}

	function getActividades()
	{
		$this->db->select('*');
		$this->db->from('actividad');
		$query = $this->db->get();
		if($query->num_rows() > 0)return $query->result();
		else return false;
	}
	function getActividad($id = '')
	{
		$this->db->select('*');
		$this->db->from('actividad');
		$this->db->where('ID_ACTIVIDAD', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0)return $query->result_array();
		else return false;
	}

	function getAsistentes($actividad = '')
	{
		//$actividad = 2;
		$this->db->select("*, DATE_FORMAT(dato_personal.FECHA_NACIMIENTO, '%d-%m-%Y') as FECHA_MODIFICADA");
		$this->db->from('dato_personal');
		$this->db->join('permiso', 'dato_personal.ID_PERSONA = permiso.ID_DATO_PERSONAL and permiso.ID_ACTIVIDAD = '.$actividad, 'left');
		$this->db->join('funcion_educ_cristiana', 'dato_personal.FUNCION_EDUC_CRISTIANA = funcion_educ_cristiana.ID_FUNCION', 'left');
		$this->db->where('permiso.ID_DATO_PERSONAL is null');
		$query = $this->db->get();
		if($query->num_rows()>0)return $query->result();
		else return false;
	}

	function getInscritos($actividad = '')
	{
		//$actividad = 1;
		$this->db->select("*, sum(CANTIDAD) as SALDO_ACTUAL, DATE_FORMAT(dato_personal.FECHA_NACIMIENTO, '%d-%m-%Y') as FECHA_MODIFICADA");
		$this->db->from('permiso');
		$this->db->join('dato_personal', 'dato_personal.ID_PERSONA = permiso.ID_DATO_PERSONAL', 'left');
		$this->db->join('funcion_educ_cristiana', 'dato_personal.FUNCION_EDUC_CRISTIANA = funcion_educ_cristiana.ID_FUNCION', 'left');
		$this->db->join('pago', 'pago.ID_PERMISO = permiso.ID_PERMISO', 'left');
		$this->db->where('permiso.ID_ACTIVIDAD', $actividad);
		$this->db->group_by('permiso.ID_PERMISO');
		$this->db->order_by('funcion_educ_cristiana.ID_FUNCION');
		$query = $this->db->get();
		if($query->num_rows()>0)return $query->result();
		else return false;
	}
	function getTotalInscritos($actividad='')
	{
		//select count(*) from permiso where ID_ACTIVIDAD = 1;	
		$this->db->select('count(*) as total');
		$this->db->from('permiso');
		$this->db->where('ID_ACTIVIDAD', $actividad);
		$query = $this->db->get();
		if($query->num_rows()>0)return $query->result();
		else return false;
	}
	
	function getPermiso($id = '', $uid = '')
	{

	$this->db->select("*, sum(CANTIDAD) as SALDO_ACTUAL, DATE_FORMAT(dato_personal.FECHA_NACIMIENTO, '%d-%m-%Y') as FECHA_MODIFICADA");
		$this->db->from('permiso');
		$this->db->join('dato_personal', 'dato_personal.ID_PERSONA = permiso.ID_DATO_PERSONAL', 'left');
		$this->db->join('funcion_educ_cristiana', 'dato_personal.FUNCION_EDUC_CRISTIANA = funcion_educ_cristiana.ID_FUNCION', 'left');
		$this->db->join('pago', 'pago.ID_PERMISO = permiso.ID_PERMISO', 'left');
		$this->db->join('actividad', 'permiso.ID_ACTIVIDAD = actividad.ID_ACTIVIDAD');
		$this->db->where('permiso.ID_ACTIVIDAD', $uid);
		$this->db->where('dato_personal.ID_PERSONA', $id);
		$this->db->group_by('permiso.ID_PERMISO');
		$this->db->order_by('funcion_educ_cristiana.ID_FUNCION');
		$query = $this->db->get();
		if($query->num_rows()>0)return $query->result();
		else return false;
	}

	function getHistorialPago($id = '')
	{
		$this->db->where('ID_PERMISO', $id);
		$query = $this->db->get('pago');
		if($query->num_rows() > 0)return $query->result();
		else return false;
	}

	function realizarpago($data)
	{
		$this->db->insert('pago',$data);
	}
	function realizarinscripcion($data)
	{
		$this->db->insert('permiso', $data);
	}
}