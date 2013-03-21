<style type="text/css" title="currentStyle">
   @import "<?php echo base_url(); ?>media/css/demo_page.css";
   /*                        @import "<?php echo base_url(); ?>media/css/header.css";*/
   @import "<?php echo base_url(); ?>media/css/demo_table.css";
</style>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/ajaxfileupload.js"></script>
<script type="text/javascript" charset="utf-8">
   var url_borrar = "<?php echo site_url(array("empresas", "borrar")) ?>";
   var url_editar = "<?php echo site_url(array("empresas","editar")) ?>";
   var url_ver = "<?php echo site_url(array("empleados","ver")) ?>";
   
</script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/abcdialog.js"></script>
<script>
$(function(){
   $("#btn_img_foto").click(function(){
       $("#userfile").click();
       return false;
   });
   $("body").delegate('#userfile','change',function(){
       $.ajaxFileUpload({
        url         :$('#form_foto').attr("action"), 
        secureuri      :false,
        fileElementId  :'userfile',
        dataType    : 'json',
        success  : function (data, status)
        {
            $("#img_foto").attr("src",data.src);
//            alert();
        }
     });
//       $('#form_foto').submit();
   });
   
   $('#form_foto').submit(function(e) {
     e.preventDefault();
     $.ajaxFileUpload({
        url         :$('#form_foto').attr("action"), 
        secureuri      :false,
        fileElementId  :'userfile',
        dataType    : 'json',
        success  : function (data, status)
        {
            $("#img_foto").attr("src",data.src);
//            alert();
        }
     });
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
       overflow: hidden;
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
   
   .inner_form{
       width: 410px;
       float: left;
   }
   
   .inner_foto{
       width: 150px;
       float: right;
   }
   
   #tbl{
       clear: both;
   }
</style>
<div class="inner">
   <button id="btn_nuevo">Nuevo Prestador de Servicio</button>
   <div id="nuevo">
               <div class="title">Complete el formulario para registrar el prestador de servicio</div>
       <div class="inner_form">
           <form method="post" action="<?php echo site_url(array("empleados", "nueva")) ?>" id="form_nuevo">
               <div class="label"><label>Nombre</label></div>              <div class="campo clearfix"><input type="text" name="nombrePersona" /></div>
               <div class="label"><label>Apellido Paterno</label></div>    <div class="campo clearfix"><input type="text" name="apellidoPatPersona" /></div>
               <div class="label"><label>Apellido Materno</label></div>    <div class="campo clearfix"><input type="text" name="apellidoMatPersona" /></div>
               <!--<div class="label"><label>Apellido Materno</label></div> <div class="campo clearfix"><input type="" id="fechaNacimientoFake" /></div>-->
               <div class="label"><label>Fecha Nacimiento</label></div>    <div class="campo clearfix"><input type="date" id="fechaNacimiento" name="fechaNacimiento" /></div>
               <div class="label"><label>Dirección</label></div>           <div class="campo clearfix"><input type="text" name="direccionPersona" /></div>
               <div class="label"><label>Teléfono</label></div>            <div class="campo clearfix"><input type="text" name="telefonoPersona" /></div>
               <div class="label"><label>Extención</label></div>           <div class="campo clearfix"><input type="text" name="extensionPersona" /></div>
               <div class="label"><label>Teléfono Celular</label></div>    <div class="campo clearfix"><input type="text" name="celularPersona" /></div>
               <div class="label"><label>Correo Electrónico</label></div>  <div class="campo clearfix"><input type="email" name="correoPersona" /></div>
               <div class="label"><label>Empresa</label></div>  <div class="campo clearfix">
                   <select name="idEmpresa">
            <?php foreach ($empresas as $e): ?>
                       <option value="<?php echo $e["idEmpresa"] ?>"><?php echo $e["nombreEmpresa"] ?></option>
                       <?php endforeach; ?>
                   </select></div>
               <div class="label">&nbsp;</div><div class="label"><input type="submit" class="submit" /></div>
           </form>
       </div>
               <div class="inner_foto">
                   <form id="form_foto" method="post" action="<?php echo site_url(array("empleados","upload_pic")) ?>">
                       <a href="#" id="btn_img_foto" title="Cambiar imagen">
                           <img src="<?php echo base_url() ?>img/nopicture.png" id="img_foto" width="150" />
                       </a>
                       <input type="file" name="userfile" id="userfile" size="20" style="visibility:hidden;position:absolute;top:0;left:0" />
                   </form>
               </div>
   </div>
   <div id="aviso_ok">
       <img src="<?php echo base_url() ?>img/ok.png" /> <span class="aviso_contenido">El prestador se ha guardado correctamente</span>
   </div>
   <table id="tbl" width="100%" style="padding: 10px">
       <thead>
           <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Empresa</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $e): ?>
                <tr idregistro="<?php echo $e["idPersona"]; ?>">
                    <td><?php echo $e["nombrePersona"] . ' ' . $e["apellidoPatPersona"] . ' ' . $e["apellidoMatPersona"] ?></td>
                    <td><?php echo $e["telefonoPersona"] . ' ext ' . $e["extensionPersona"] . ' / ' . $e["celularPersona"] ?></td>
                    <td><?php echo $e["nombreEmpresa"] ?></td>
                    <td><a href="<?php echo site_url(array("empleados", "borrar", $e["idPersona"])) ?>" class="tbl_delete_row" ><img src="<?php echo base_url() ?>img/delete-icon.png" width="18" /></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>