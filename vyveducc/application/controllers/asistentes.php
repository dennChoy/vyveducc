<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asistentes extends CI_Controller
{
	function _construct()
	{
		parent::_construct();
		//$this->load->model('user','',TRUE);


	}

	function index()
	{
		$this->datos['username']= $this->session->userdata('NOMBRE_USUARIO');   
		$this->load->helper('form');
		$this->load->model('asistentes_model');
		$this->datos['funcionAlumno'] = $this->asistentes_model->getFuncionAlumno();
		$this->datos['funcionEncargado'] = $this->asistentes_model->getFuncionEncargado();

		$data['segmento'] = $this->uri->segment(3);//se puede cambiar el 3
		if (!$data['segmento'])
			{
				$this->datos['asistentes'] = $this->asistentes_model->obtenerDatos();
			}else
			{
				$this->datos['asistentes'] = $this->asistentes_model->obtenerDato($data['segmento']);
			}

		//$data['username']= $this->session->userdata('username');
		$this->datos['cuerpo'] = 'control_personas/inicio'; //Carga una vista
		$this->load->view('header', $this->datos);

	}

	function editarpersona($id = '')
	{
		$this->datos['username']= $this->session->userdata('NOMBRE_USUARIO');   
		$this->load->model('asistentes_model');
		$this->load->helper('form');
    	if (!empty($id)) 
    	{
    		$asistentes = $this->asistentes_model->obtenerDato($id);
    		if ($asistentes) 
    		{
    			$this->datos['asistentes'] = $asistentes;
    		}

    	$this->datos['funcionAlumno'] = $this->asistentes_model->getFuncionAlumno();
		$this->datos['funcionEncargado'] = $this->asistentes_model->getFuncionEncargado();
		$this->datos['sexo'] = $this->asistentes_model->getSexo();
		$this->datos['cuerpo'] = 'control_personas/editar'; //Carga una vista
		$this->load->view('header', $this->datos);
    	}
	}


	function guardarpersona()
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
		$this->load->model('asistentes_model');
		$id = $this->uri->segment(3);
		if ($id > 0)
		{
			//Acutaliza los datos segun el $id
			$this->asistentes_model->actualizarDato($id,$data);
			//echo "Actualizando";
		}elseif($id == 0)
		{
			//Funcion de guardar
			$this->asistentes_model->insertaDato($data);
			//echo "Guardando";
		}
		
		redirect(base_url('asistentes'));

	}


	 function eliminarpersona()
    {
    	$this->load->model('asistentes_model');
    	$id = $this->uri->segment(3);
    	$this->asistentes_model->eliminar($id);
    	redirect(base_url('asistentes'));
    }

    function excel()
    {
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Nombre de la Hoja');
		//set cell A1 content with some text
		$this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
		//change the font size
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		//make the font become bold
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		//merge cell A1 until D1
		$this->excel->getActiveSheet()->mergeCells('A1:G1');
		//set aligment to center for that merged cell (A1 to D1)
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		 
		$filename='nombre'; //save our workbook as this file name
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
		header('Cache-Control: max-age=0'); //no cache
		             
		
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

    }
    function reportExcel()
    {
    	$this->load->model('asistentes_model');
   
		 
		$this->load->library('excel');

		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Nombre de la Hoja');
		//Nombre a los titulos
		$tituloReporte = "TITULO DE REPORTE";
		$titulosColumnas = array('NOMBRE', 'APELLIDO', 'FECHA DE NACIMIENTO', 'sexo');
		$this->excel->getActiveSheet()->mergeCells('A1:G1');
		$this->excel->getActiveSheet()->setCellValue('A1', $tituloReporte)
									  ->setCellValue('A3',$titulosColumnas[0])
									  ->setCellValue('B3',$titulosColumnas[1])
									  ->setCellValue('C3',$titulosColumnas[2])
									  ->setCellValue('D3',$titulosColumnas[3]);
		//change the font size
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		//make the font become bold
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		//set aligment to center for that merged cell (A1 to D1)
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	   $data = $this->asistentes_model->obtenerDatos();
   		
	   	$i = 4;
       	foreach ($data->result() as $usuario) 
        {
       		$this->excel->getActiveSheet()->setCellValue('A'.$i, $usuario->NOMBRES);
       		$this->excel->getActiveSheet()->setCellValue('B'.$i, $usuario->APELLIDOS);	
       		$this->excel->getActiveSheet()->setCellValue('C'.$i, $usuario->FECHA_MODIFICADA);	
       		$this->excel->getActiveSheet()->setCellValue('D'.$i, $usuario->SEXO);
            $i++;
        }
        for($i = 'A'; $i <= 'D'; $i++){
			$this->excel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
	
		 
		$filename='nombre'; //save our workbook as this file name
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
		header('Cache-Control: max-age=0'); //no cache
		             
		
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
		
    }
     function ojo()
    {
    	$this->load->library('excel');

		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Nombre de la Hoja');

		$tituloReporte = "TITULO DE REPORTE";
		$titulosColumnas = array('NOMBRE', 'FECHA DE NACIMIENTO', 'SEXO', 'DIRECCION');
		$this->excel->getActiveSheet()->mergeCells('A1:G1');
		$this->excel->getActiveSheet()->setCellValue('A1', $tituloReporte)
									  ->setCellValue('A3',$titulosColumnas[0])
									  ->setCellValue('B3',$titulosColumnas[1])
									  ->setCellValue('C3',$titulosColumnas[2])
									  ->setCellValue('D3',$titulosColumnas[3]);

		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);

		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
		 
		$filename='nombre'; //save our workbook as this file name
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
		header('Cache-Control: max-age=0'); //no cache
		             
		
		//$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007'); 
		 $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
		



    }

}
?>