<?php

Class Mensaje_model extends CI_Model{
    function get_Notificaciones_Cantidad($id){
        $q = $this->db->query("SELECT COUNT(*) AS cantidad FROM notificaciones WHERE idUsuario1 = $id");
        return $q->row_Array();
    }
    
    function get_where($id){
        $q = $this->db->query("SELECT n.idNotificacion ,CONCAT(p.nombrePersona, ' ', p.apellidoPatPersona) AS nombre,
        n.`mensaje`, n.`fechaCreacion`
        FROM personas AS p, usuarios AS u, notificaciones AS n WHERE 
        n.`idUsuario2`= u.`idUsuario` AND u.`idPersona` = p.`idPersona` AND n.`idUsuario1`= $id");
        return $q->result_Array();
    }
    function get_where_mensaje($id, $not){
        $q = $this->db->query("SELECT n.idNotificacion ,CONCAT(p.nombrePersona, ' ', p.apellidoPatPersona) AS nombre,
        n.`mensaje`, n.`fechaCreacion`
        FROM personas AS p, usuarios AS u, notificaciones AS n WHERE 
        n.`idUsuario2`= u.`idUsuario` AND u.`idPersona` = p.`idPersona` AND n.`idUsuario1`= $id AND n.`idNotificacion` = $not");
        return $q->row_Array();
    }
    function get_nombre(){
        $q = $this->db->query("SELECT CONCAT(p.nombrePersona, ' ', p.apellidoPatPersona) AS 
        nombre, u.idUsuario FROM personas AS p, usuarios AS u 
        WHERE p.`idPersona`=u.`idPersona` GROUP BY u.`idUsuario`");
        if($q->num_rows > 0){
        foreach ($q->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['nombre']));
        $new_row['value']=htmlentities(stripslashes($row['idUsuario']));
        $row_set[] = $new_row; //build an array
        }
        echo json_encode($row_set); //format the array into json data
      }
    }
    
}
?>
