<div id="ver_detalles">
    <div class="inner_foto">
        <img src="<?php echo base_url() ?>img/nopicture.png" id="img_foto" width="150" />
        <button>Editar Información</button>
    </div>
    <div class="inner_form">
        <div class="label"><label>Nombre</label></div>
            <div class="campo clearfix"><?php echo $p["nombrePersona"] . ' ' . $p["apellidoPatPersona"] . ' ' . $p["apellidoMatPersona"] ?></div>
        <div class="label"><label>Teléfono</label></div>
            <div class="campo clearfix"><?php echo $p["telefonoPersona"] . ' ext ' . $p["extensionPersona"] . ' / ' . $p["celularPersona"] ?></div>
        <div class="label"><label>Correo Electrónico</label></div>
            <div class="campo clearfix"><?php echo $p["correoPersona"] ?></div>
        <div class="label"><label>Dirección</label></div>
            <div class="campo clearfix"><?php echo $p["direccionPersona"] ?></div>
        <div class="label"><label>Fecha de nacimiento</label></div>
            <div class="campo clearfix"><?php echo $p["fechaNacimiento"] ?></div>
          
    </div>
</div>