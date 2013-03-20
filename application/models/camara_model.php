<?php
class Camara_model extends CI_Model{
    function get_camara(){
        $q = $this->db->get("camaras");
        return $q->result_Array();
    }
    
    function get_camara_by_idCamara($idcamara){
        $q = $this->db->get_where("camaras", array("idCamara" => $idcamara));
        return $q->row_Array();
    }
    
    function set_camara_by_idusuario_idcamara($idusuario, $idcamara){
        $data['idCamara']  = $idcamara;
        $data['idUsuario'] = $idusuario;
        $q = $this->db->insert("relacioncamaras", $data);
    }
    
    function get_usuarios_by_idCamara($idcamara){
        $q = $this->db->query("select up.* from personas up left join usuarios u on u.idPersona = up.idPersona 
            left join relacioncamaras rc on rc.idUsuario = u.idUsuario 
            where rc.idCamara = $idcamara");
        return $q->result_Array();
    }
    
    function del_permisos_by_idusuario_idcamara($idusuario, $idcamara){
        $this->db->delete("relacioncamaras", array("idUsuario" => $idusuario, "idCamara" => $idcamara));
    }
    
    function get_usuarios_not_in_idCamara($idcamara){
        $q = $this->db->query("SELECT up.* FROM personas up left join usuarios u on u.idPersona = up.idPersona
            WHERE u.idPersona not in (SELECT u.idUsuario FROM usuarios u
            LEFT JOIN relacioncamaras rc ON rc.idUsuario = u.idUsuario
            WHERE rc.idCamara = $idcamara)");
        return $q->result_Array();
    }
}