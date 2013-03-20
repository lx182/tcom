<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Camaras extends CI_Controller {

    function index(){
       $this->load->model("camara_model");
       $data['camaras'] = $this->camara_model->get_camara();
       $this->load->view("administrador/camaras", $data);
   }
   
   function detalle_cam($idcamara){
       $this->load->model("camara_model");
       $data["usuario"]  = $this->camara_model->get_usuarios_not_in_idCamara($idcamara);
       $data["camara"]   = $this->camara_model->get_camara_by_idCamara($idcamara);
       $data["permisos"] = $this->camara_model->get_usuarios_by_idCamara($idcamara);
       $this->load->view("administrador/detalle_cam", $data);
   }
   
   function asignar($idusuario, $idcamara){
       $this->load->model("camara_model");
       $this->camara_model->set_camara_by_idusuario_idcamara($idusuario, $idcamara);
   }
   
   function deshabilitar($idusuario, $idcamara){
       $this->load->model("camara_model");
       $this->camara_model->del_permisos_by_idusuario_idcamara($idusuario, $idcamara);
   }

}