<style>
    #camaras{
        background: url('<?php echo base_url();?>/img/btn_active_camaras.png');
    }
    #camaras-content{
        padding: 20px;
    }
    #lista_camaras{
        list-style: none;
        max-height: 500px;
        overflow: scroll;
    }
    #lista_camaras li{
        float: left;
        width: 250px;
        height: 230px;
        border: 1px solid #0063DC;
        border-radius: 8px;
        margin-right: 10px;
        margin-bottom: 10px;
    }
</style>
<div id="camaras-content">
    <ul id="lista_camaras">
        <?php foreach($camaras as $cam):?>
            <li><img src="<?php echo base_url();?>camaras/camara_<?php echo $cam['idCamara'];?>.png"/></li>
        <?php endforeach;?>
        <li></li>
    </ul>
</div