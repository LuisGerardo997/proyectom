<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservar extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Reservaciones_model');
        $this->load->model('Login_model');
        $this->load->model('Clientes_model');
        $this->load->model('Habitacion_model');
        $this->load->model('Tipo_habitacion_model');
        $this->load->model('Modulo_model');
    }

	public function index()
	{
    if (null!==($this->input->post('fecha_estadia'))){
      $fecha_estadia = $this->input->post('fecha_estadia');
    }else{
      $fecha_estadia = '';
    };
    if(null!==($this->input->post('fecha_salida'))){
      $fecha_salida = $this->input->post('fecha_salida');
    }else{
      $fecha_salida = '';
    };
    if(null!==($this->input->post('cod_th'))){
      $tipo_habitacion = $this->input->post('cod_th');
    }else{
      $tipo_habitacion = '';
    };
    $tipos_habitacion = $this->Reservaciones_model->type_room_list($fecha_estadia, $fecha_salida, $tipo_habitacion);
    $datos = array(
      'th' => $tipos_habitacion,
      'fecha_estadia'=>$fecha_estadia,
      'fecha_salida'=>$fecha_salida,
    );
    $this->load->view('client-page/reservaciones/reservar', $datos);
  }


  public function consultar_disponibilidad(){
    $fecha_estadia = $this->input->post('fecha_estadia');
    $fecha_salida = $this->input->post('fecha_salida');
    $tipos_habitacion = $this->input->post('tipo_habitacion');
    $resultado = $this->Reservaciones_model->room_list($fecha_estadia, $fecha_salida, $tipos_habitacion);
    echo json_encode($resultado);
  }

  public function tipo_habitacion(){
    $fecha_estadia = $this->input->get('fecha_estadia');
    $fecha_salida = $this->input->get('fecha_salida');
    $tipo_habitacion = $this->input->get('cod_th');
    $resultado = $this->Reservaciones_model->type_room_list($fecha_estadia, $fecha_salida, $tipo_habitacion);
    echo json_encode($resultado);
  }
}
