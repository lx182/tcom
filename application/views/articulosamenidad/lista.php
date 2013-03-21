<style type="text/css" title="currentStyle">
    @import "<?php echo base_url(); ?>media/css/demo_page.css";
    /*                        @import "<?php echo base_url(); ?>media/css/header.css";*/
    @import "<?php echo base_url(); ?>media/css/demo_table.css";
</style>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
    var url_borrar = "<?php echo site_url(array("articulosamenidad", "borrar")) ?>";
    var url_editar = "<?php echo site_url(array("articulosamenidad","editar")) ?>";
    $(function() {
        $("#fechaAdquisicion" ).datepicker();
        $("#fechaAdquisicion" ).datepicker("option","dateFormat","yy-mm-dd");
    }); 
        
</script>

<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/abc.js"></script>
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
    
    #tbl{
        clear: both;
    }
</style>
<div class="inner">
    <button id="btn_nuevo">Nueva Amenidad</button>
    <div id="nuevo">
        <form method="post" action="<?php echo site_url(array("articulosamenidad", "nueva")) ?>" id="form_nuevo">
            <div class="title">Complete formulario para registrar amenidad</div>
            <div class="label"><label>Amenidad</label></div> 
            <div class="campo clearfix">
             <select name="idAmenidad">
    <?php $query = $this->db->query("Select idAmenidad,amenidad From amenidades Order By amenidad");
    ?>
    <?php foreach ($query->result() as $row): ?>
    <option value="<?php echo $row->idAmenidad ?>"><?php echo  $row->amenidad ?></option>
     <?php endforeach; ?>             
             </select>
            </div>
            <div class="label"><label>Articulo</label></div> <div class="campo clearfix"><input type="text" name="articulo" /></div>
            <div class="label"><label>Fecha Adquisicion</label></div> <div class="campo clearfix"><input type="text" name="fechaAdquisicion" id="fechaAdquisicion" /></div>
            <div class="label">&nbsp;</div><div class="label"><input type="submit" class="submit" /></div>
        </form>
    </div>
    <div id="aviso_ok">
        <img src="<?php echo base_url() ?>img/ok.png" /> <span class="aviso_contenido">Amenidad se ha guardado correctamente</span>
    </div>
    <table id="tbl" width="100%" style="padding: 10px; width: 50px;">
        <thead>
            <tr>
                <th>Amenidad</th>
                <th>Articulo</th>
                <th>Fecha Adquisicion</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articulosamenidad as $e): ?>
                <tr idregistro="<?php echo $e["idArticulo"]; ?>">
                    <td campo="idAmenidad"><?php echo $e["idAmenidad"] ?></td>
                    <td campo="articulo"><?php echo $e["articulo"] ?></td>
                    <td campo="fechaAdquisicion"><?php echo $e["fechaAdquisicion"] ?></td>
                    <td><a href="<?php echo site_url(array("empresas", "borrar", $e["idArticulo"])) ?>" class="tbl_delete_row" ><img src="<?php echo base_url() ?>img/delete-icon.png" width="18" /></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>