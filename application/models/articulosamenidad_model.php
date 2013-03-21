<?php
class Articulosamenidades_model extends CI_Model{
    function get_Amenidades(){
        $q = $this->db->get("amenidades");
        return $q->result_Array();
    }
}