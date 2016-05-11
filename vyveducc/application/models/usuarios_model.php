<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
	function _construct()
	{
		parent::_construct();
		$this->load->database();
	}

	function obtenerDatos()
	{
		$this->db->from('usuario');
		$this->db->join('rol_usuario', 'usuario.ROL_USUARIO = rol_usuario.ID_TIPO_USUARIO', 'left');
		$this->db->order_by('NOMBRE_TIPO', 'desc'); 
		$query = $this->db->get();
		if($query -> num_rows() > 0) return $query;
		else return false;
	}

	function obtenerDato($id)
	{
		$this->db->from('usuario');
		$this->db->join('rol_usuario', 'usuario.ROL_USUARIO = rol_usuario.ID_TIPO_USUARIO', 'left');
		$this->db->order_by('NOMBRE_TIPO', 'desc'); 
		$this->db->where('ID_USUARIO',$id);
		$query = $this->db->get();
		if($query -> num_rows() > 0) return $query;
		else return false;
	}


	function obtenerRoles()
	{
		$query = $this->db->get('rol_usuario');
		if($query -> num_rows() > 0) return $query->result();
		else return false;
	}

	function obtenerRol($id)
	{
		$this->db->where('ID_TIPO_USUARIO', $id);
		$query = $this->db->get('rol_usuario');
		if($query -> num_rows() > 0) return $query;
		else return false;
	}

	function insertaUsuario($data)
	{
		$this->db->insert('usuario',$data);
	}

	function actualizaUsuario($id, $datos)
	{
		//$this->db->set($datos);
		$this->db->where('ID_USUARIO', $id);
		$this->db->update('usuario', $datos);
	}

	function insertaRol($data)
	{
		$this->db->insert('rol_usuario',$data);
	}

	function actualizaRol($id, $datos)
	{
		//$this->db->set($datos);
		$this->db->where('ID_TIPO_USUARIO', $id);
		$this->db->update('rol_usuario', $datos);
	}

	function getRol()
    {
   		$query = $this->db->query('select *from rol_usuario');
        return $query->result();
    }
    function eliminaUsuario($id)
	{
		$this->db->delete('usuario', array('ID_USUARIO'=>$id));
	}
	function eliminaRol($id)
	{
		$this->db->delete('rol_usuario', array('ID_TIPO_USUARIO'=>$id));
	}

}