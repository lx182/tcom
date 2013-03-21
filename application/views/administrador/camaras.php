<script type="text/javascript" src="<?php echo base_url();?>/jwplayer/jwplayer.js"></script>
<script type="text/javascript">jwplayer.key="rE+ZfeCyVP0awOpaLiW4LuLwiqx+/fu+R7liLA==";</script>
<script src="http://jwpsrv.com/library/hDVWkpHJEeKPryIACqYeXg.js"></script>
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
    #lista_camaras li a{
        z-index: 999999;
    }
    #stream_wrapper{
        z-index: -1;
    }
</style>
<script>
    $(function(){
        jwplayer('stream').setup({
        file: 'http://www.youtube.com/watch?v=Hdv0PRWj9v4',
        width: '250',
        height: '230',
        autostart: true
    });
       var dialog_camara = $("<div />").attr("id","dialogCam").attr("title", "Asignación de Cámaras");
        dialog_camara.dialog({
                                autoOpen: false,
                                height: 600,
                                width: 900,
                                modal: true,
                                position: 'top' 
                        });
            $( ".camara" ).click(function() {
                                        dialog_camara.dialog( "open" );
                                        dialog_camara.html($('#ajax-loader').clone());
                                        dialog_camara.load(this.href);
                                        return false;
                                }); 
    });
</script>
<div id="camaras-content">
    <ul id="lista_camaras">
        <li><a class='camara' href="<?php echo base_url();?>index.php/camaras/detalle_cam/1"><div id='stream'></div></a></li>
        <?php foreach($camaras as $cam):?>
            <li><a class='camara' href="<?php echo base_url();?>index.php/camaras/detalle_cam/<?php echo $cam['idCamara'];?>"><img src="<?php echo base_url();?>camaras/camara_<?php echo $cam['idCamara'];?>.png"/></a></li>
        <?php endforeach;?>
    </ul>
</div