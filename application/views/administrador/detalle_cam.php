
<style type="text/css" title="currentStyle">
    @import "<?php echo base_url(); ?>media/css/demo_page.css";
    /*                        @import "<?php echo base_url(); ?>media/css/header.css";*/
    @import "<?php echo base_url(); ?>media/css/demo_table.css";
</style>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
    $(function(){
        $(".asigna").click(function(){
        });
    });
</script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/abcd.js"></script>

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
    #tb2{
        clear: both;
    }
    #tb1{
        clear: both;
    }
</style>
<h3>INFORMACIÓN DE LA CAMARA</h3>
<div id="content-camara">
    <label>IP: </label><span><?php echo $camara['IPCamara'];?></span><br>
    <label>Circuito: </label><span><?php echo $camara['idCircuito'];?></span>
    <hr>
</div>
<?php if(!$permisos):?>
    <h2>Cámara privada</h2>
<?php else:?>
<div class="inner">
    <h3>Usuarios con acceso a la cámara</h3>
    <table id="tb1" width="100%" style="padding: 10px; width: 600px;">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Dirrección</th>
                <th>Telefono</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permisos as $p): ?>
                <tr idregistro="<?php echo $p["idPersona"]; ?>">
                    <td><a href="<?php echo site_url(array("camaras", "deshabilitar", $p["idPersona"], $camara['idCamara'])) ?>" class="tbl_update_row"><img src="<?php echo base_url() ?>img/btn_add.png" tittle="Asingar" width="18" /></a></td>
                    <td campo="nombrePersona"><?php echo $p["apellidoPatPersona"] ?> <?php echo $p["apellidoMatPersona"] ?> <?php echo $p["nombrePersona"] ?></td>   
                    <td campo="correoUsuario"><?php echo $p["correoPersona"] ?></td>
                    <td campo="direccionPersona"><?php echo $p["direccionPersona"] ?></td>
                    <td campo="telefonoPersona"><?php echo $p["telefonoPersona"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif;?>
<hr>
<h3>Seleccione usuario que verá la cámara</h3>
<div class="inner">
    <table id="tb2" width="100%" style="padding: 10px; width: 600px;">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Dirrección</th>
                <th>Telefono</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuario as $u): ?>
                <tr idregistro="<?php echo $u["idPersona"]; ?>">
                    
                    <td><a href="<?php echo site_url(array("camaras", "asignar", $u["idPersona"],$camara['idCamara'])) ?>"class="tbl_update_row asigna" ><img src="<?php echo base_url() ?>img/btn_add.png" tittle="Asingar" width="18" /></a></td>
                    <td campo="nombrePersona"><?php echo $u["apellidoPatPersona"] ?> <?php echo $u["apellidoMatPersona"] ?> <?php echo $u["nombrePersona"] ?></td>   
                    <td campo="correoUsuario"><?php echo $u["correoPersona"] ?></td>
                    <td campo="direccionPersona"><?php echo $u["direccionPersona"] ?></td>
                    <td campo="telefonoPersona"><?php echo $u["telefonoPersona"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
