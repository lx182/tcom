<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mensaje extends CI_Controller {
    public function nuevo(){
        
        $this->load->model("abc_model");
        $data['idUsuario1'] = $this->input->post('idUsuario1');
        $data['idUsuario2'] = $this->input->post('idUsuario2');
        $data['mensaje'] = $this->input->post('mensaje');
        $id = $this->abc_model->set("notificaciones", $data); 
        echo $id;
    }
    public function mensajes(){
       $this->load->view("contador/enviar");
    }
    public function borrar($id){
        $this->load->model("abc_model");
        $id = $this->abc_model->delete("notificaciones", $id, "idNotificacion");
        echo "true";
    }
    function get_nombres(){
    $this->load->model('mensaje_model');
    if (isset($_GET['term'])){
      $q = strtolower($_GET['term']);
      $this->mensaje_model->get_nombre($q);
    }
  }
  function get_mensaje($id, $not){
      $this->load->model("mensaje_model");
      $data["notificacion"] = $this->mensaje_model->get_where_mensaje($id, $not);
      $this->load->view('contador/ver',$data);
      
  }
    
    
}
?>
