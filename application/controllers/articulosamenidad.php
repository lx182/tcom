<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Articulosamenidad extends CI_Controller {

    public function index(){
        $this->load->model("abc_model");
        $data["articulosamenidad"] = $this->abc_model->get("articulosamenidad"); 
        $this->rest->debug();
        $this->load->view('articulosamenidad/lista', $data);
    }
    
    public function nueva(){
        $this->load->model("abc_model");
        $id = $this->abc_model->set("articulosamenidad", $this->input->post()); 
        echo $id;
    }
    
    public function borrar($id){
        $this->load->model("abc_model");
        $id = $this->abc_model->delete("articulosamenidad", $id, "idArticulo");
        echo "true";
    }
    
    public function editar(){
        $this->load->model("abc_model");
        $id = $this->input->post("row_id");
        $campo = $this->input->post("column");
        $valor = $this->input->post("value");
        $id = $this->abc_model->update("articulosamenidad", $id, "idArticulo", $campo, $valor);
        echo $valor;
    }

}