<?php
class Empleado_model extends CI_Model{
    public function get_empleados(){
        $this->db->join("empresas", "empresas.idEmpresa = empresapersona.idEmpresa", "left");
        $this->db->join("personas", "personas.idPersona = empresapersona.idPersona", "left");
        $this->db->select("empresas.*, personas.*");
        $q = $this->db->get("empresapersona");
//        echo $this->db->last_query();
        return $q->result_Array();
    }
    public function get_empleado($idPersona){
        $this->db->join("empresas", "empresas.idEmpresa = empresapersona.idEmpresa", "left");
        $this->db->join("personas", "personas.idPersona = empresapersona.idPersona", "left");
        $this->db->select("empresas.*, personas.*");
        $q = $this->db->get_where("empresapersona", array("empresapersona.idPersona" => $idPersona));
//        echo $this->db->last_query();
        return $q->row_Array();
    }
}