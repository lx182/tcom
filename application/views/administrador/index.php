<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css" />
<script>
        $(function() {
                $("#empleados").click(function(){
                    $("#main-content").load("<?php echo base_url();?>index.php/vistas/empleados_view");
                });
                $("#reportes").click(function(){
                    $("#main-content").load("<?php echo base_url();?>index.php/vistas/empleados_view");
                });
                $("#asignacion").click(function(){
                    $("#main-content").load("<?php echo base_url();?>index.php/vistas/empleados_view");
                });
                $("#ocompra").click(function(){
                    $("#main-content").load("<?php echo base_url();?>index.php/vistas/empleados_view");
                });
                $("#empresas").click(function(){
                    $("#main-content").load("<?php echo base_url();?>index.php/vistas/empleados_view");
                });
                $("#camaras").click(function(){
                    $("#main-content").load("<?php echo base_url();?>index.php/vistas/empleados_view");
                });
                $("#conceptos").click(function(){
                    $("#main-content").load("<?php echo base_url();?>index.php/vistas/empleados_view");
                });
});
</script>
<style>
    body{
        font-family: tahoma;
        font-size: 12px;
    }
    #headera{
        background-image: url("<?php echo base_url();?>/img/bannerAdmon.png");
    }
    #footer{
        background-color: #2899cb; 
        font-size: 11px;
    }
    #main-content{
        width: 629px;
        border: 1px solid #2666A0;
        height: auto;
        position: relative;
        float: right;
        top: 330px;
    }
    #cobranza{
        background: url('<?php echo base_url();?>/img/btn_asignacion.png');
    }
    #reportes{
        background: url('<?php echo base_url();?>/img/btn_reportes.png');
    }
    #empleados{
        background: url('<?php echo base_url();?>/img/btn_empleados.png');
    }
    #conceptos{
        background: url('<?php echo base_url();?>/img/btn_conceptos.png');
    }
    #ocompra{
        background: url('<?php echo base_url();?>/img/btn_ocompra.png');
    }
    #empresas{
        background: url('<?php echo base_url();?>/img/btn_empresas.png');
    }
    #condominos{
        cursor: pointer;
        background-image: url("<?php echo base_url();?>/img/btn_eventos_condomino.png");
        background-repeat:no-repeat; 
    }
    #condominos:hover{
        cursor: pointer;
        background-image: url("<?php echo base_url();?>/img/btn_active_condomino.png");
        background-repeat:no-repeat; 
    }
    #camaras{
        background: url('<?php echo base_url();?>/img/btn_camaras.png');
    }
    </style>
<nav>
    <ul>
        <li id="cobranza"></li>
        <li id="reportes"></li>
        <li id="empleados"></li>
        <li id="condominos"></li>
        <li id="conceptos"></li>
        <li id="ocompra"></li>
        <li id="empresas"></li>
        <li id="camaras"></li>
        </ul>
</nav>
<span>AAAAAzzzzzzzzzzzzzz</span>
<section id="main-content">
</section>