<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index(){
         if($this->session->userdata('username')){
             header('Location:home');
         }
         if(isset($_POST['pass'])){
             if (($this->Login_model->ingresar($_POST['user'],$_POST['pass']))==1){
               $usuario = $_POST['user'];
               $cargo = $this->Login_model->cargo($usuario);
               $datos = $this->Login_model->datospersonales($usuario);
               $dat = array(
                 'username' => $usuario,
                 'cargo' => $cargo->cargo,
                 'cod_p' => $datos->cod_persona,
                 'nombres' => $datos->nombres,
                 'apellido_p' => $datos->apellido_paterno,
                 'apellido_m' => $datos->apellido_materno,
                 'email' => $datos->email,
                 'foto_p' => $datos->foto_persona,
               );
                 $this->session->set_userdata($dat);
                 }
                 header("Location:home");
             }else{
                 $this->load->view('login/sign-in');
             }
     }
     public function cerrar_sesion(){
       $this->session->sess_destroy();
       redirect('login','refresh');

     }


/*
    public function index(){

        if($this->session->userdata('username')){
            header('Location:home');
        }
        if(isset($_POST['pass'])){
            $this->load->model('login_model');
            if (($this->login_model->ingresar($_POST['user'],$_POST['pass']))==1){
                $this->session->set_userdata('username',$_POST['user']);
                }
                header("Location:home");
            }else{
                $this->load->view('login/login');
            }
        $this->load->view('login/login');
    }

    public function cerrar_sesion(){
      $this->session->sess_destroy();
      redirect('login','refresh');

    }
}

 public function ingresar()
        $user=$this->input->post('user');
        $pass=$this->input->post('pass');

        $res = $this->login_model->ingresar($user,$pass);

        if ($res==1){
            $this->load->view('home');
        }else{
            $data['mensaje']='<script>alert("Usuario o contraseña incorrectos")</script>';
            $this->load->view('login',$data);

        }
    }*/
}
