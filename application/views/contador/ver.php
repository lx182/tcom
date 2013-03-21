<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/* @var $notificacion type */

?>
<script>
    var id = "<?php echo $this->session->userdata("idUsuario");?>";
    
                    
                    
    $(".tbl_delete_mensage").off('click');
                $(".tbl_delete_mensage").click(function(e){
                    e.preventDefault();
                    if(confirm('Esta seguro de eliminar este mensaje?')){
                        var row = $(this).closest("tr").get(0);
                        $.get($(this).attr('href'));
                       mensaje.dialog('close').remove();
                       $("#main-content").load("<?php echo base_url();?>index.php/vistas/notificacionesA_view/"+id);
                    }
                });
</script>
<hr>
<br>
<h2>Mensaje</h2>
<br>
<label><strong>De:</strong> <?php echo $notificacion['nombre'];?></label><br>
<label><strong>Enviado:</strong> <?php echo $notificacion['fechaCreacion'];?></label><span>       </span><a id ="borrar"href="<?php echo site_url(array("mensaje", "borrar", $notificacion["idNotificacion"])) ?>" class="tbl_delete_mensage" title="Borrar" ><img src="<?php echo base_url() ?>img/delete-icon.png" width="18" /></a>
<hr>

<h4>Cuerpo:</h4>
<p><?php if($notificacion["mensaje"]=="") echo '(Mensaje vacio)'; else echo $notificacion["mensaje"];?></p>
