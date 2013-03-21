<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css" />
<script>
    
        $(function () {
            function Cambiar(){
            $('.emergente').hide();
            $(".emergente").removeClass('visible');
            $("#eventos").attr("style","background: url('<?php echo base_url();?>/img/btn_eventos.png');");    
            }
                $("#eventos").click(function(){
                    $("#main-content").load("<?php echo base_url();?>index.php/vistas/eventos_view");
                    $('.emergente').toggle("blind");
                    if ($(".emergente").hasClass("visible")) {
                        $(".emergente").removeClass('visible');
                        $("#eventos").attr("style","background: url('<?php echo base_url();?>/img/btn_eventos.png');");    
                      } else { 
                        $(".emergente").addClass('visible');
                        $("#eventos").attr("style","background: url('<?php echo base_url();?>/img/btn_active_eventos.png');");
                     
                 }});
                 
                 //Eventos Internos
                 $("#internos").click(function(){
                    $("#main-content").load("<?php echo base_url();?>index.php/vistas/internos_view");
  
                 });
                 $("#externos").click(function(){
                    $("#main-content").load("<?php echo base_url();?>index.php/vistas/externos_view");
  
                 });
                 $("#asambleas").click(function(){
                    $("#main-content").load("<?php echo base_url();?>index.php/vistas/asambleas_view");
  
                 });
                 $("#dias").click(function(){
                    $("#main-content").load("<?php echo base_url();?>index.php/vistas/dias_view");
  
                 });
                 $("#publicar").click(function(){
                    $("#main-content").load("<?php echo base_url();?>index.php/vistas/publicar_view");
  
                 });
            $("#reservaciones").click(function(){
                $("#main-content").load("<?php echo base_url();?>index.php/vistas/reservaciones_view");
            Cambiar();    
             });
            $("#servicios").click(function(){
                $("#main-content").load("<?php echo base_url();?>index.php/vistas/servicios_view");
            Cambiar();    
             });
            
            
            $("#administracion").click(function(){
                $("#main-content").load("<?php echo base_url();?>index.php/vistas/administracion_view");
            Cambiar();
            });
        
            $("#consulta").click(function(){
                $("#main-content").load("<?php echo base_url();?>index.php/vistas/consulta_view");
            Cambiar();
            });
        
            $("#navegador").click(function(){
                $("#main-content").load("<?php echo base_url();?>index.php/vistas/navegador_view");
                Cambiar();
            });
        
            $("#notificaciones").click(function(){
                $("#main-content").load("<?php echo base_url();?>index.php/vistas/notificaciones_view");
                Cambiar();
            });
            
        });
       
 
</script>

<style>
    body{
        font-family: tahoma;
        font-size: 12px;
    }
    .visible{
        display: block;
    }
    header{
        background-image: url("<?php echo base_url();?>/img/bannerCondomino.png");
    }
    footer{
        background-color: #3E7B14;
        font-size: 11px;
    }
    
    #menu-left{

        padding-top: 50px;
        color: black;
       
       
    }
    #eventos{
        background-image: url("<?php echo base_url();?>/img/btn_eventos.png");    
        cursor:pointer;
    }
    #eventos:hover{
        background-image: url("<?php echo base_url();?>/img/btn_active_eventos.png");    
        cursor:pointer;
    }
    #reservaciones{
        background-image: url("<?php echo base_url();?>/img/btn_reservaciones.png");
        cursor:pointer;
    }
    #reservaciones:hover{
        background-image: url("<?php echo base_url();?>/img/btn_active_reservaciones.png");
        cursor:pointer;
    }

        #servicios{
        background-image: url("<?php echo base_url();?>/img/btn_reservaciones.png");
        cursor:pointer;
    }
    #servicios:hover{
        background-image: url("<?php echo base_url();?>/img/btn_active_reservaciones.png");
        cursor:pointer;
    }
    
    #administracion{
        background-image: url("<?php echo base_url();?>/img/btn_adminCoto.png");
        cursor:pointer;
    }
    #administracion:hover{
        background-image: url("<?php echo base_url();?>/img/btn_active_administracionC.png");
        cursor:pointer;
    }
    #consulta
    {
        background-image: url("<?php echo base_url();?>/img/btn_consultaCondo.png");  
        cursor:pointer;
    }
    #consulta:hover
    {
        background-image: url("<?php echo base_url();?>/img/btn_active_consultaC.png");  
        cursor:pointer;
    }
    #navegador{
        background-image: url("<?php echo base_url();?>/img/btn_nvgdrCondo.png");
        cursor:pointer;
    }
    #navegador:hover{
        background-image: url("<?php echo base_url();?>/img/btn_active_nvgdrCondo.png");
        cursor:pointer;
    }
    #notificaciones{
        background-image: url("<?php echo base_url();?>/img/btn_notificacionesCondo.png");
        cursor:pointer;
    }
    #notificaciones:hover{
        background-image: url("<?php echo base_url();?>/img/btn_active_notificacionesCondo.png");
        cursor:pointer;
    }
    #main-content{
        width: 629px;
        border: 1px solid #3E7B14;
        height: auto;
        position: relative;
        float: right;
        top: 22px;
    }
    .wrapperSecond{
        height: 600px;
    }
    #salir{
        background: url('<?php echo base_url();?>/img/btn_salirC.png');
    }
    #salir:hover{
        background: url('<?php echo base_url();?>/img/btn_active_salirC.png');
    }
    
    .ui-accordion .ui-accordion-header{
        padding: 0px;
        margin: 0px;
        border: none;
    } 
    .emergente{
        width: 310px;
        display: none;

        
    }
    .emergente-li{
        border: 1px solid #3E7B14;
        border-bottom: 0px;
        width: 310px;
        height: 50px;
        margin-top: 0px;    
    }
    #internos{
        cursor: pointer;
        background-image: url("<?php echo base_url();?>/img/btn_eventos_internos.png");
        background-repeat:no-repeat;  
    }
    #internos:hover{
        cursor: pointer;
        background-image: url("<?php echo base_url();?>/img/btn_eventos_internos_active.png");
        background-repeat:no-repeat;  
    }
    #externos{
        cursor: pointer;
        background-image: url("<?php echo base_url();?>/img/btn_eventos_externos.png");
        background-repeat:no-repeat; 
    }
    #externos:hover{
        cursor: pointer;
        background-image: url("<?php echo base_url();?>/img/btn_eventos_externos_active.png");
        background-repeat:no-repeat; 
    }
    #asambleas{
        cursor: pointer;
        background-image: url("<?php echo base_url();?>/img/btn_eventos_asambleas.png");
        background-repeat:no-repeat; 
    }
    #asambleas:hover{
        cursor: pointer;
        background-image: url("<?php echo base_url();?>/img/btn_eventos_asambleas_active.png");
        background-repeat:no-repeat; 
    }
    #dias{
        cursor: pointer;
        background-image: url("<?php echo base_url();?>/img/btn_eventos_dias.png");
        background-repeat:no-repeat; 
    }
    #dias:hover{
        cursor: pointer;
        background-image: url("<?php echo base_url();?>/img/btn_eventos_dias_active.png");
        background-repeat:no-repeat; 
    }
    #publicar{
        cursor: pointer;
        background-image: url("<?php echo base_url();?>/img/btn_eventos_publicar.png");
        background-repeat:no-repeat; 
    }
    #publicar:hover{
        cursor: pointer;
        background-image: url("<?php echo base_url();?>/img/btn_eventos_publicar_active.png");
        background-repeat:no-repeat; 
    }

    #usuario{
        left: 340px;
        position: relative;
        top: 10px;
    }

</style>
<div id="usuario">
    <img src="<?php echo base_url();?>/img/welcomeC.png"/>&nbsp;&nbsp;<strong><?php echo $u['usuario'];?></strong>
</div>
<nav>
    <ul>
       <li id="eventos"></li>
       <div class="emergente">

           <ul>
               <li id="internos" class="emergente-li"></li>
               <li id="externos" class="emergente-li"></li>
               <li id="asambleas" class="emergente-li"></li>
               <li id="dias" class="emergente-li"></li>
               <li id="publicar" class="emergente-li" style="border-bottom: 1px solid #3E7B14;"></li>
           </ul>
       </div>
       <li id="reservaciones"></li>
       <li id="administracion"></li>
       
       <li id="consulta"></li>
       <li id="navegador"></li>
       <li id="notificaciones"></li>
       <li id="servicios"></li>
       
       <a href="<?php echo base_url();?>index.php/usuarios/logout"><li id="salir"></li></a>   
    </ul>
</nav>
<section id="main-content">
    
</section>


