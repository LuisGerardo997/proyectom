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
        if(isset($_POST['pass']) && isset($_POST['user'])){
            if (($this->Login_model->ingresar($_POST['user'],$_POST['pass']))==1){
                $usuario = $_POST['user'];
                $cargo = $this->Login_model->cargo($usuario);
                $datos = $this->Login_model->datospersonales($usuario);
                $pool = $this->Login_model->perfiles($usuario);
                $num = count($pool);
                $dat = array(
                    'username' => $usuario,
                    'cargo' => $cargo->cargo,
                    'cod_p' => $datos->cod_persona,
                    'nombres' => $datos->nombres,
                    'apellido_p' => $datos->apellido_paterno,
                    'apellido_m' => $datos->apellido_materno,
                    'email' => $datos->email,
                    'foto_p' => $datos->foto_persona,
                    'color_p' => $datos->color,
                );
                $this->session->set_userdata($dat);
                if ($num > 1){
                    header("Location:login/select_perfil");
                }else{
                    $perf = $pool[0]['cod_perfil'];
                    $perf1 = $pool[0]['perfil'];
                    $data = array(
                        'perfil' => $perf,
                        'nom_perfil' => $perf1,
                    );
                    $this->session->set_userdata($data);
                    redirect('home');
                }
            }else{
                $respuesta = array(
                    'mensaje' => 'El usuario y/o contraseña son incorrectos, por favor ingréselos correctamente.',
                );
                $this->load->view('login/sign-in', $respuesta);
            }
        }else{
            $this->load->view('login/sign-in');
        }
    }
    public function cerrar_sesion(){
        $this->session->sess_destroy();
        redirect('login','refresh');

    }
    public function perfiles(){
        $persona = $this->session->userdata('username');
        $resultado = $this->Login_model->perfiles($persona);
        print_r($resultado[0]['cod_perfil']);
    }
    public function select_perfil(){
        $persona = $this->session->userdata('username');
        $pool = $this->Login_model->perfiles($persona);
        $num = count($pool);
        $data = array(
            'perfiles' => $pool,
            'total' => $num,
        );
        $this->load->view('login/select_perfil',$data);
        $this->load->view('home/footer_dt');
    }
    public function registro_perfil(){
        $cod_perfil = $this->input->post('cod_perfil');
        $perfil = $this->Login_model->nombre_perfil($cod_perfil);
        $data = array(
            'perfil' => $cod_perfil,
            'nom_perfil' => $perfil[0]['perfil'],
        );
        $this->session->set_userdata($data);
        echo 'hecho';
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
