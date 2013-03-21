<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Apartados extends CI_Controller {

    public function index(){
    	
        $this->load->model("abc_model");
        $data["apartados"] = $this->abc_model->get("apartados"); 
        $this->load->view('apartados/lista', $data);

    }
    
    public function registraAccion() {
    	$this->load->model("abc_model");
    	$id = $this->input->post("row_id");
    	$campo = $this->input->post("column");
    	$valor = $this->input->post("value");
//    	var_dump($this->input->post());
//    	$this->rest->debug();
    	$id = $this->abc_model->update("apartados", $id, "idApartado", $campo, $valor);
    	echo $valor;
    }
    public function nueva(){
        $this->load->model("abc_model");
//        echo $this->input->post();
        $id = $this->abc_model->set("apartados", $this->input->post()); 
        //echo $id;
        redirect('.');
    }
    
    public function borrar($id){
        $this->load->model("abc_model");
        $id = $this->abc_model->delete("apartados", $id, "idApartado");
        echo "true";
    }
    
    public function editar(){
        $this->load->model("abc_model");
        $id = $this->input->post("row_id");
        $campo = $this->input->post("column");
        $valor = $this->input->post("value");
        $id = $this->abc_model->update("apartados", $id, "idApartado", $campo, $valor);
        echo $valor;
    }

}