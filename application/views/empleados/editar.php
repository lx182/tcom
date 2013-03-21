<form method="post" action="<?php echo site_url(array("empleados", "editar")) ?>" id="form_editar">
               <div class="label"><label>Nombre</label></div>              <div class="campo clearfix"><input type="text" name="nombrePersona" /></div>
               <div class="label"><label>Apellido Paterno</label></div>    <div class="campo clearfix"><input type="text" name="apellidoPatPersona" /></div>
               <div class="label"><label>Apellido Materno</label></div>    <div class="campo clearfix"><input type="text" name="apellidoMatPersona" /></div>
               <!--<div class="label"><label>Apellido Materno</label></div> <div class="campo clearfix"><input type="" id="fechaNacimientoFake" /></div>-->
               <div class="label"><label>Fecha Nacimiento</label></div>    <div class="campo clearfix"><input type="date" id="fechaNacimiento" name="fechaNacimiento" /></div>
               <div class="label"><label>Dirección</label></div>           <div class="campo clearfix"><input type="text" name="direccionPersona" /></div>
               <div class="label"><label>Teléfono</label></div>            <div class="campo clearfix"><input type="text" name="telefonoPersona" /></div>
               <div class="label"><label>Teléfono Celular</label></div>    <div class="campo clearfix"><input type="text" name="celularPersona" /></div>
               <div class="label"><label>Extención</label></div>           <div class="campo clearfix"><input type="text" name="extensionPersona" /></div>
               <div class="label"><label>Correo Electrónico</label></div>  <div class="campo clearfix"><input type="email" name="correoPersona" /></div>
               <div class="label"><label>Empresa</label></div>  <div class="campo clearfix">
                   <select name="idEmpresa">
            <?php foreach ($empresas as $e): ?>
                       <option value="<?php echo $e["idEmpresa"] ?>"><?php echo $e["nombreEmpresa"] ?></option>
                       <?php endforeach; ?>
                   </select></div>
               <div class="label">&nbsp;</div><div class="label"><input type="submit" class="submit" /></div>
           </form>