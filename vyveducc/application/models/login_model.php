<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
  function _construct()
  {
    parent::_construct();
    $this->load->database();
  }
/*
  function login($username, $password)
  {
     $this->db->select('ID_USUARIO, NOMBRE_USUARIO, PASSWORD');
     $this->db->from('usuario');
     $this->db->where('NOMBRE_USUARIO', $username);
     $this->db->where('PASSWORD', MD5($password));
     $this->db->limit(1);
   
     $query = $this->db->get();
   
     if($query -> num_rows() == 1)
     {
       return $query->result();
     }
     else
     {
       return false;
     }
   }
*/
   function log($username, $password)
  {
    $this->db->where('NOMBRE_USUARIO', $username);
    $this->db->where('PASSWORD', $password);
    $query = $this->db->get('usuario');
     if($query -> num_rows() == 1)
     {
       return $query->row();
     }
     else
     {
       return false;
     }
  }

}