<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Empleados extends CI_Controller {

    public function index(){
        $this->load->model("empleado_model");
        $data["empleados"] = $this->empleado_model->get_empleados();
        $this->load->view('empleados/lista', $data);
    }
    function upload_pic() {
        $status = "";
        $msg = "";
        $file_element_name = 'userfile';

        if ($status != "error") {
            $config['upload_path'] = './fotos/tmp/';
            $config['allowed_types'] = 'jpg';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload($file_element_name)) {
                $data = $this->upload->data();
                $this->session->set_userdata("tmp_pic", $data['file_name']);
//                $file_id = $this->files_model->insert_file($data['file_name'], $_POST['title']);
//                if ($file_id) {
//                    $status = "success";
//                    $msg = "File successfully uploaded";
//                } else {
//                    unlink($data['full_path']);
//                    $status = "error";
//                    $msg = "Something went wrong when saving the file, please try again.";
//                }
            }
//            @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array("src"=>"/fotos/tmp/".$data['file_name']));
    }
    
    function nueva(){
        $this->load->model("abc_model");
        $data["persona"] = $this->input->post();
        unset($data["persona"]["idEmpresa"]);
        $idpersona = $this->abc_model->set("personas", $data["persona"]); 
        $id = $this->abc_model->set("empresapersona", array("idEmpresa" => $this->input->post("idEmpresa"), "idPersona" => $idpersona));
        if ($this->session->userdata("tmp_pic") != null)
            if(copy("/fotos/tmp/" . $this->session->userdata("tmp_pic"), "/fotos/personas/" . $idpersona . ".jpg"));
                unlink("/fotos/tmp/" . $this->session->userdata("tmp_pic"));
        echo $idpersona;
    }
    
    function ver($idpersona){
        $this->load->model("empleado_model");
        $data["p"] = $this->empleado_model->get_empleado($idpersona);
        
        $this->load->view("empleados/ver",$data);
    }

}