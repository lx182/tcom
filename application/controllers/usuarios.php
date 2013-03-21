<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {
//Genera ID de la sesión tomando como base el ID del usuario
    public function login() {
        $this->load->library('rest');
        //            $this->rest->api_key("android");        
        if ($this->input->post('correo') != null && $this->input->post('contrasena') != null) {
            $data['idUsuario'] = $this->rest->post("server.php/usuarios/idUsuario_by_correo_contrasena/", array('correo' => $this->input->post('correo'), "contrasena" => $this->input->post('contrasena')), 'json');
 //          $this->rest->debug();
   //        die($data['idUsuario']);
            if ($data["idUsuario"] > 0) {
                $this->session->set_userdata("idUsuario", $data["idUsuario"]);
            } else {
//                    $this->session->set_flashdata('errorLogin',true);
            }
        }
        header("Location: " . base_url());
    }
//Termina la sesión destruyendo el ID del usuario
    public function logout() {
        $this->session->sess_destroy();
        header("Location: " . base_url());
    }
    //Regresa todos los usuarios
    public function allUsuarios(){
        if($this->session->userdata("idUsuario") > 0){
            $this->load->library('rest');
            $data['usuarios'] = (array) $this->rest->get("server.php/usuarios/allUsuarios", '', 'json');
//            $this->rest->debug();
            $this->load->view("condomino/consultaCondo", $data);
        }
    }

}