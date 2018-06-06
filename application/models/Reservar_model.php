<?php
class Reservaciones_model extends CI_Model{

  function __constuct(){
    parent::__construct();
    date_default_timezone_set('America/Lima');
  }
}
