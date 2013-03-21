<?php 
$hoy = getdate();

?>
<style type="text/css" title="currentStyle">
    @import "<?php echo base_url(); ?>media/css/demo_page.css";
    /*                        @import "<?php echo base_url(); ?>media/css/header.css";*/
    @import "<?php echo base_url(); ?>media/css/demo_table.css";
</style>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
    var url_borrar = "<?php echo site_url(array("condominos", "borrar")) ?>";
    var url_editar = "<?php echo site_url(array("condominos","editar")) ?>";
    
</script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/abc.js"></script>
<script>
    $(function(){
       
       $("#btn_nuevo").button();
       $("#asignar").button();

//        $( "#asignar" ).click(function() {
//          $( "#main-content" ).load("<?php echo base_url();?>index.php/lotes/lote");
//        });
      
        $("#nacimiento" ).datepicker();
        $("#nacimiento" ).datepicker("option","dateFormat","yy-mm-dd");
        var dialog = $("<div id='loteMostrar' />");
        dialog.dialog({
                                autoOpen: false,
                                height: 900,
                                width: 1058,
                                modal: true,
                                position: 'top' 
                        });
            $( "#asignarl" ).click(function() {
                                        dialog.dialog( "open" );
                                        dialog.html($('#ajax-loader').clone());
                                        dialog.load(this.href);
                                        return false;
                                });
            
    });
</script>


<style>
    .inner{
        padding: 5px;
    }

    .label {
        width: 100px;
        text-align: right;
        display: inline-block;
        clear: left;
    }

    .campo {
        display: inline;
    }

    .campo input {
        width: 300px;
    }
    .submit {
        width: 100px;
    }
    .clearfix:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0;
    }

    #nuevo {
        display: none;
        border: 1px solid #D3D6FF;
        background-color: #F0F1FA;
        padding: 10px;
        margin: 10px;
    }

    #nuevo .title {
        text-align: center;
        font-size: 14px;
        font-weight: bold;
        background-color: white;
        border: 1px solid #D3D6FF;
        margin: 2px;
        padding: 2px;
    }

    #aviso_ok img {
        width: 30px;
        vertical-align:middle;
    }
    #aviso_ok {
        padding: 5px;
        margin: 5px 0px;
        text-align: center;
        display: none;
        font-size: 14px;
        font-weight: bold;
        background-color: #D1E6D2;
        border: 1px solid #245C26;
    }
    #condominos{
        cursor: pointer;
        background-image: url("<?php echo base_url();?>/img/btn_active_condomino.png");
        background-repeat:no-repeat; 
    }
    
    #tbl{
        clear: both;
    }
</style>
<div class="inner">
    <button id="btn_nuevo">Nuevo condómino</button>
    <div id="nuevo">
        <form method="post" action="<?php echo site_url(array("condominos", "nuevaC")) ?>" id="form_nuevo">
            <div class="title">Complete el formulario para registrar el condomino</div>
            <div class="label"><label>Correo</label></div> <div class="campo clearfix"><input type="text" name="correoUsuario" /></div>
            <input type="text" name="idTipo" value="3" hidden="true"/>
            <div class="label"><label>Contraseña</label></div> <div class="campo clearfix"><input type="text" name="contrasena" /></div>
            <input id="fechaRegistro" type="text" name="fechaRegistro" hidden="true" value="<?php echo $hoy['year']."-".$hoy['mon']."-".$hoy['mday']?>"/>
            <div class="label"><label>Nombre Condomino</label></div> <div class="campo clearfix"><input type="text" name="nombrePersona" /></div>
            <div class="label"><label>Apellido Paterno</label></div> <div class="campo clearfix"><input type="text" name="apellidoPatPersona" /></div>
            <div class="label"><label>Apellido Materno</label></div> <div class="campo clearfix"><input type="text" name="apellidoMatPersona" /></div>
            <div class="label"><label>Fecha de nacimiento</label></div> <div class="campo clearfix"><input id="nacimiento" type="datetime" name="fechaNacimiento" /></div>
            <div class="label"><label>Dirección</label></div> <div class="campo clearfix"><input type="text" name="direccionPersona" /></div>
            <div class="label"><label>Telefono</label></div> <div class="campo clearfix"><input type="text" name="telefonoPersona" /></div>
            <div class="label"><label>Celular</label></div> <div class="campo clearfix"><input type="text" name="celularPersona" /></div>
            <div class="label"><label>Extensión</label></div> <div class="campo clearfix"><input type="text" name="extensionPersona" /></div>
            <div class="label"><label>Correo (otro)</label></div> <div class="campo clearfix"><input type="text" name="correoPersona" /></div>
            <div class="label"><label>Estado</label></div> <div class="campo clearfix">
                <select name="estado">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            
            <div class="label">&nbsp;</div><div class="label"><input type="submit" class="submit" /></div>
        </form>
    </div>
    <div id="aviso_ok">
        <img src="<?php echo base_url() ?>img/ok.png" /> <span class="aviso_contenido">La empresa se ha guardado correctamente</span>
    </div>
    <button id="asignar"><a id ="asignarl"href="<?php echo base_url();?>index.php/lotes/lote">Asignar Lotes</a></button>
    <table id="tbl" width="100%" style="padding: 10px">
        <thead>
            <tr>
                <th>Correo</th>
                <th>Tipo</th>
                <th>Constraseña</th>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Materno</th>
                <th>Fecha Nacimiento</th>
                <th>Dirrección</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Extensión</th>
                <th>Correo Alt</th>
                <th>Estado</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $e): ?>
                <tr idregistro="<?php echo $e["idUsuario"]; ?>">
                    <td campo="correoUsuario"><?php echo $e["correoUsuario"] ?></td>
                    <td campo="idTipo"><?php echo $e["idTipo"] ?></td>
                    <td campo="contrasena"><?php echo $e["contrasena"] ?></td>
                    <td campo="fechaRegistro"><?php echo $e["fechaRegistro"] ?></td>
                    <td campo="nombrePersona"><?php echo $e["nombrePersona"] ?></td>
                    <td campo="apellidoPatPersona"><?php echo $e["apellidoPatPersona"] ?></td>
                    <td campo="apellidoMatPersona"><?php echo $e["apellidoMatPersona"] ?></td>
                    <td campo="fechaNacimiento"><?php echo $e["fechaNacimiento"] ?></td>
                    <td campo="direccionPersona"><?php echo $e["direccionPersona"] ?></td>
                    <td campo="telefonoPersona"><?php echo $e["telefonoPersona"] ?></td>
                    <td campo="celularPersona"><?php echo $e["celularPersona"] ?></td>
                    <td campo="extensionPersona"><?php echo $e["extensionPersona"] ?></td>
                    <td campo="correoPersona"><?php echo $e["correoPersona"] ?></td>
                    <td campo="estado"><?php if($e["estado"]=="1") echo 'Activo'; else echo "Inactivo"; ?></td>
                    <td><a href="<?php echo site_url(array("condominos", "borrar", $e["idUsuario"])) ?>" class="tbl_delete_row" ><img src="<?php echo base_url() ?>img/delete-icon.png" width="18" /></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div id="dialogo"></div>
</div>