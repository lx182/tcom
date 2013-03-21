<?php

class Ajax extends Controller {

  public function Ajax() {
  
    parent::Controller(); 
  }

  public function lista_apartados()
    {
//    	header('Content-Type: application/text; charset=utf-8');
//    	echo(json_encode(1));
    	 
  	$idUsuario = $_POST['idUsuario'];
  	$fechaApartado = $_POST['fechaApartado'];
  	$sql= "Select a.horaInicial,a.horaFInal,m.articulo From apartados a ";
  	$sql = $sql." Inner Join articulosamenidad m On m.idArticulo=a.idArticulo"; 
  //	$sql=$sql." Where fechaApartado=".$fechaApartado." and idUsuario=".$idUsuario; 
  	$sql=$sql." Where idUsuario=".$idUsuario; 
  	$query = $this->db->query($sql);
    foreach ($query->result() as $row): 
      echo '<br />'.$row->Articulo.' '.$row->horaInicial.' a '.$row->horaFinal;
    endforeach; 
	
  }

}

/* End of file ajax.php */
/* Location: ./system/application/controllers/ajax.php */
