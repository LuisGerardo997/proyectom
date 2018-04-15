<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->model('Modulo_model');
        $this->load->model('Reservaciones_model');
    }
    function index(){
        $this->load->view('client-page/index');
    }
}