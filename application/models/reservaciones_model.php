<?php
class Reservaciones_model extends CI_Model{
	public function get($tabla){
		$q = $this->db->get($tabla);
		//        echo $this->db->last_query();
		return $q->result_Array();
	}

	public function get_Reservaciones($idUsuario,$fecha){
		$q = $this->db->query("SELECT * FROM apartados WHERE idUsaurio=".$idUsuario. " and fechaHoraInicio=".$fecha);
		return $q->result_Array();
	}
	function set($tabla, $data){
		$this->db->insert($tabla,$data);
		return $this->db->insert_id();
	}
	function delete($tabla,$id,$field){
		$this->db->where($field, $id);
		$this->db->delete($tabla);
	}

	function update($tabla, $id, $idfield, $field, $value){
		$this->db->where($idfield, $id);
		$this->db->update($tabla, array($field => $value));
	}
}

//function get_lote(){
//	$q = $this->db->get("lotes");
//	return $q->result_Array();
//}
//function get_lote_by_id($id){
//	$q = $this->db->get_where("lotes",array("idLote" => $id));
//	return $q->row_Array();
//}