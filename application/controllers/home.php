<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
    }


	public function index()
	{
        if($this->session->userdata('username')){
            $user = $this->session->userdata('username');
            $nombre = $this->session->userdata('nombres');
            $apellido_p = $this->session->userdata('apellido_p');
            $apellido_m = $this->session->userdata('apellido_m');
            $email = $this->session->userdata('email');
            $data = array(
                'nombre' => $nombre,
                'apellido_p' => $apellido_p,
                'apellido_m' => $apellido_m,
                'email' => $email,
            );
            $this->load->view('home/main',$data);
            $this->load->view('home/pie');

        }else{
            header('Location:login');
        }
    }
    public function gestionar_db(){
      $this->load->view('panel_control');
    }
}
