<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos extends CI_Controller 
{
	function _construct()
	{
		parent::_construct();

	}

	function index()
	{
		$this->load->helper('form');
		$this->load->view('header');
		$this->load->view('control_pagos/index_pagos');
	}


	function iniciosesion()
	{
		$this->load->view('home');
		//$this->load->view('home');
	}


}
?>