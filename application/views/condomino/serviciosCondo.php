<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
  <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>

<script>
    var modoOperacion=0;  //0=Captura,1=Control,2=Historial
       $(function() {
       $("fechaServicio").val(<?php echo date('Y-m-d') ?>);

//
                                

  $("#todo").click(function() {
     refrescaGrid();
	  });
           $("#usa").click(function() {
               modoOperacion=1;
               $("#contenido-uso").fadeIn();
               $("#contenido-aparta").hide();
               $("#contenido-historial").hide();
               $("#resultado").show();
               $("#resumen").hide();
               $("#usa").addClass("btnactivo"); 
               $("#usa").removeClass("btninactivo"); 
               $("#aparta").addClass("btninactivo"); 
               $("#aparta").removeClass("btnactivo"); 
               $("#historial").addClass("btninactivo"); 
               $("#historial").removeClass("btnactivo"); 
               //forza
               $('#todo').prop('checked', true);
               refrescaGrid();
//               $('#previos thead th:nth-child(8)').show();  // Activa acciones 
 //              $('#previos tbody td:nth-child(8)').show();
});
           $("#aparta").click(function() {
               modoOperacion=0;
           $("#contenido-uso").hide();
               $("#contenido-aparta").fadeIn();
               $("#contenido-historial").hide();
               $("#resultado").show();
               $("#resumen").hide();
               $("#aparta").addClass("btnactivo"); 
               $("#aparta").removeClass("btninactivo"); 
               $("#usa").addClass("btninactivo"); 
               $("#usa").removeClass("btnactivo"); 
               $("#historial").addClass("btninactivo"); 
               $("#historial").removeClass("btnactivo"); 
               $('#todo').prop('checked', false);
               refrescaGrid();
});
           $("#historial").click(function() {
               modoOperacion=2;
               
               $("#contenido-uso").hide();
               $("#contenido-aparta").hide();
               $("#contenido-historial").fadeIn();
               $("#resultado").hide();
               $("#resumen").show();
               $("#historial").addClass("btnactivo"); 
               $("#historial").removeClass("btninactivo"); 
               $("#aparta").addClass("btninactivo"); 
               $("#aparta").removeClass("btnactivo"); 
               $("#usa").addClass("btninactivo"); 
               $("#usa").removeClass("btnactivo"); 
               $('#todo').prop('checked', false);
               refrescaGrid();
});
           
    	   $("#fechaServicio" ).datepicker();
           $("#fechaServicio" ).datepicker("option","dateFormat","yy-mm-dd");
           $("#fechaServicio" ).change(function() {
              refrescaGrid();
               });
           $("#fechaServicio" ).blur(function() {
               refrescaGrid();
                });
           
           
           $("#refresca").click(function() {
             refrescaGrid();
           });
           $("#accion-asiste").click(function() {
             $(":checked.acciones").each(
          		  function(index) {
            		    var iden=this.id;
            		    iden=iden.substring(4);
            		    //hacer el post...
            		    var datos={'row_id':iden,'column':"terminado",'value':"1"};
            		    $.ajax({
                            url: '<?php echo base_url(); ?>index.php/servicios/registraAccion',
                            type: "post",
                            data: datos,
                            beforeSend: function() {
                            },
                            success: function(result) {
                                window.location.reload();
                            },
                            error:function(result) {
                                alert("Detalle en la consulta");
                                //window.location.reload();
                            }
                                
                        }); //ajax
            		  }); //function
//               });//each
               return false;
           });  //click
           $("#accion-cancela").click(function() {
               $(":checked.acciones").each(
            		  function(index) {
              		    var iden=this.id;
              		    iden=iden.substring(4);
              		    //hacer el post...
              		    var datos={'row_id':iden,'column':"cancelada",'value':"1"};
              		  alert(datos.row_id);            		    
              		    $.ajax({
                              url: '<?php echo base_url(); ?>index.php/servicios/registraAccion',
                              type: "post",
                              data: datos,
                              beforeSend: function() {
                              },
                              success: function(result) {
                                  alert("ok");
                                  window.location.reload();
                              },
                              error:function(result) {
                                  alert("Detalle en la consulta");
                                  //window.location.reload();
                              }
                                  
                          }); //ajax
              		  }); //function
//                 });//each
                 return false;
             });  //click
           

           });  //jquery
           
       function refrescaGrid() {
           var fechaServicio = $('#fechaServicio').val();
           var idProveedor='No.'+$('#idProveedor').val();
           var misApartados=$('#todo').is(':checked');
           $('#previos tr').show();  // Vuelve a mostrar todo
           $('#previos thead th').show();
           $('#previos tbody td').show();
           // Oculta columnas auxiliares
           //fecha(1) aparato(2) condomino(3) amenidad(4) desde(5) hasta(6) accion(7)
       //    if (misApartados) {
           if (modoOperacion==0) {
           //              $('#previos thead th:nth-child(3)').hide(); 
//              $('#previos tbody td:nth-child(3)').hide();
              $('#previos thead th:nth-child(6)').hide(); 
              $('#previos tbody td:nth-child(6)').hide();
           }
           else
           {
               $('#previos thead th:nth-child(6)').show(); 
               $('#previos tbody td:nth-child(6)').show();
           //            $('#previos thead th:nth-child(1)').hide();
  //            $('#previos thead th:nth-child(2)').hide();
  //            $('#previos tbody td:nth-child(1)').hide();
  //            $('#previos tbody td:nth-child(2)').hide();
  //            $('#previos thead th:nth-child(8)').hide(); 
  //            $('#previos tbody td:nth-child(8)').hide();
}
           // Filtra registros que no cumplan el criterio
    <?php $query = $this->db->query("Select concat(trim(p.apellidoPatPersona),' ',trim(p.apellidoMatPersona),' ',trim(p.nombrePersona)) as condomino From usuarios u Inner join personas p on p.idPersona=u.idPersona Where u.idUsuario=".$this->session->userdata("idUsuario"));
    ?>
    <?php foreach ($query->result() as $row): ?>
    <?php $condomino=$row->condomino; ?>
     <?php endforeach; ?>
           var condomino="<?php echo $condomino ?>";
           if (misApartados ) {
   //            $('#previos tbody tr:not( :has(td:contains('+condomino+')))').hide();
            }   
           else
           {
     //          $('#previos tbody tr:not( :has(td:contains('+fechaServicio+')))').hide();
     //          $('#previos tbody tr:not( :has(td:contains('+idArticulo+')))').hide();
            }
         }
       </script>

<style>
#reservaciones{
        background-image: url("<?php echo base_url();?>/img/btn_active_reservaciones.png");
        cursor:pointer;
    }
    .buscador{
        width: 412px;
        height: 37px;
        margin-left: 23px;
        background: url("<?php echo base_url();?>/img/imagen_buscador.png") repeat scroll 0 0 transparent;
        outline: 0 none;
        border: none;
        padding-right: 55px;
        padding-left: 15px;
    }
    .fechas{
        width: 152px;
        height: 37px;
        margin-left: 23px;
/*        background: url("<?php echo base_url();?>/img/imagen_buscador.png") repeat scroll 0 0 transparent;
        outline: 0 none;
        border: none; */
        padding-right: 55px;
        padding-left: 15px;
}
    #eventos{
        background-image: url("<?php echo base_url();?>/img/btn_eventos.png");
        cursor:pointer;
    }
     
    </style>
    
    <style>
    #navegacion {
      padding:10px;
    }
    #contenido-uso {
       display:none;
       padding-left:5px;
    }
    #contenido-aparta {
       display:none;
       padding-left:5px;
}
    #resultado {
    display:none;
    margin-left:10px;
    }
    #resumen {
    display:none;
    }
    
    .btnactivo{
       background-color:#ffeeee;
    }
    .btninactivo
    {
       background-color:white;
}
    .tablaapartados {
       margin-top:5px;
       margin-left:5px;
       color:#3E7B14;
       font-size:8pt;
       border:1px dotted gray;    
    }
    .tablaapartados th {
       color:white;
       background-color:#3E7B14;
       font-size:8pt;
    }
    .tablaapartados td {
       padding:2px;
    }
    
    .tablahistorial {
       margin-top:5px;
       margin-left:5px;
       color:#3E7B14;
       font-size:8pt;
       border:1px dotted gray;    
    }
    .tablahistorial th {
       color:white;
       background-color:#3E7B14;
       font-size:8pt;
    }
    .tablahistorial td {
       padding:2px;
    }
    
    #galeria_amenidades{
        list-style: none;
        width: 300px;
    }
    #galeria_amenidadesx li{
        float: left;
        height: 50px;
        width: 60px;
    }
    #galeria_amenidades li a{
        text-decoration: none;
        color: #ff00ff;
    }
    .info{
        width: 100%;
        height: 100%;
        background: rgba(255, 0, 0, 0.6);
        position: relative;
        top: 0px;
    }
    #galeria_amenidades li:hover .info{
        visibility: visible;
    }

    .button  {
       font-size:10pt;
       color:#3E7B14;
       border:1px dotted black;
       padding:3px;

      
    }

    .button:hover  {
       border:1px solid black;
    }
    
    .submit  {
       font-size:10pt;
       color:#3E7B14;
       border:1px dotted black;
       padding:3px;
    }
    .submit:hover  {
       border:1px solid black;
    }
    
    #titulousuario {
      font-size:12pt;
      text-align:left;
      margin-left:10px;
      padding:3px;
    }
 </style>

    
<div id="titulousuario">
    <?php foreach ($query->result() as $row): ?>
    <?php $condomino=$row->condomino; ?>
    <?php endforeach; ?>
    <?php echo $condomino; ?>
</div>    
    <div id="navegacion">
      <input type="button" class="button" value="Solicitud de Servicios" id="aparta"    name="aparta"/>
      <input type="button" class="button" value="Control de Servicios"      id="usa"       name="usa"/>
      <input type="button" class="button" value="Historial de Servicios"  id="historial" name="historial"/>
    </div>
    <div id="contenido-uso" style="margin-left:10px;">
      <input type="button" class="button" value="Terminado"  id="accion-asiste"   name="accion-asiste"/>
      <input type="button" class="button" value="Cancela" id="accion-cancela"  name="accion-cancela"/>
    </div>
    <div id="contenido-aparta">
      <form method="post" action="<?php echo site_url(array("servicios", "nueva")) ?>" id="form_nuevo">
      
      <p>
        <b style="color: #3E7B14; margin-left: 21px; font-size: 14px;">Seleccionar Proveedor</b>
      </p>
      <div class="campo clearfix" style="margin-left:10px;">
         <select name="idProveedor" id="idProveedor">
         <option value="0">(Ninguno)</option>
         <?php
         $sql= "Select p.idPersona,";
         $sql.="concat(trim(e.nombreEmpresa),': ',trim(p.apellidoPatPersona),' ',trim(p.apellidoMatPersona),' ',trim(p.nombrePersona)) as proveedor";
         $sql.=" From personas p"; 
         $sql.=" Inner Join empresaPersona ep On ep.idPersona=p.idPersona";
         $sql.=" Inner Join empresas e         On e.idEmpresa=ep.idEmpresa";
         $sql.="  Order By 2"; 
         $query = $this->db->query($sql);
         ?>
         <?php foreach ($query->result() as $row): ?>
         <option value="<?php echo $row->idPersona ?>"><?php echo  $row->proveedor ?></option>
         <?php endforeach; ?>
         </select>
       </div>
       <br />
      <div class="label" style="margin-left:10px;"><input type="text" class="submit" id="concepto" name="concepto" value="(Concepto del Servicio)" size="80"  /></div>
       <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $this->session->userdata("idUsuario"); ?>"/>
       <input type="hidden" name="folio" id="folio" value="100"/>
       <input type="hidden" name="costo" id="costo" value="200"/>
       <input type="hidden" name="terminado" id="terminado" value="0"/>
       <input type="hidden" name="cancelada" id="cancelada" value="0"/>
       
      
      <p>
       <span style="color: #3E7B14; margin-left: 21px; font-size: 14px;">Fecha de Solicitud</span>
      </p>
       <input class="fechas" type="text"  name="fechaServicio" id="fechaServicio" value=""     />
       <div class="label" style="margin-left:10px;"><input type="submit" class="submit" value="Guardar Solicitud" /></div>
       
      </form>         
       
    </div>
 
    
    <!-- Fin controles de apartados -->

    <!-- GRID -->
       <div id="resultado">
         <table id="previos" border="0" cellspacing="0" cellpadding="2" class="tablaapartados">
         <thead>
         <tr>
          <th>Fecha Servicio</th>
          <th>Proveedor Solicitado</th>
          <th>Concepto del Servicio</th>
          <th>Estatus</th>
          <th>Accion</th>
          </tr>
         </thead>
         <tbody>
         <?php
               $hoy = date('Y-m-d');
               $sql ="Select s.idServicio,s.idProveedor";
               $sql.=",concat(trim(p.apellidoPatPersona),' ',trim(p.apellidoMatPersona),' ',trim(p.nombrePersona)) as proveedor";
               $sql.=",s.concepto"; 
               $sql.=",s.fechaServicio";
               $sql.=",Case When terminado=1 Then 'Terminado' When Cancelada=1 Then 'Cancelada' Else 'Pendiente' End As estatus,";
               $sql.="terminado,cancelada";
               $sql.=" From servicios s ";
               $sql.="  Left join personas p        on p.idPersona=s.idProveedor ";
               $sql.="  Left Join empresaPersona ep On ep.idPersona=p.idPersona";
               $sql.="  Left Join empresas e        On e.idEmpresa=ep.idEmpresa";
               $sql.=" Order By s.fechaServicio desc"; ?>
       <?php $query = $this->db->query($sql);
       ?>
       <?php foreach ($query->result() as $row):
            $identificador= "chk-" . (string)$row->idServicio;
            $iden=$row->idServicio;
         ?>
         <tr id="<?php echo $iden ?>">
          <td><?php echo $row->fechaServicio ?></td>
          <td><?php echo $row->proveedor ?></td>
          <td><?php echo $row->concepto ?></td>
          <td><?php echo $row->estatus ?></td>
          <?php 
          if ($row->fechaServicio>=$hoy and ($row->cancelada==0 and $row->terminado==0)) { 
          ?>
          <td><input type="checkbox" id="<?php echo $identificador ?>" class="acciones" /></td>
          <?php
          }
          else         
          { 
          ?>
          <td>&nbsp;</td>
          <?php 
          }
          ?>
          
          </tr>
       <?php endforeach; ?>
       </tbody>
       </table>
       <br />
       </div> 
       <!-- RESUMEN -->
       <div id="resumen">
         <table id="previos2" border="0" cellspacing="0" cellpadding="2" class="tablahistorial">
         <thead>
         <tr>
          <th>Proveedor Solicitado</th>
          <th>Primer servicio</th>
          <th>Ultimo servicio</th>
          <th>No. Servicios</th>
          </tr>
         </thead>
         <tbody>
         <?php
               $hoy = date('Y-m-d');
               $sql ="Select concat(trim(p.apellidoPatPersona),' ',trim(p.apellidoMatPersona),' ',trim(p.nombrePersona)) as proveedor"; 
               $sql.=",Min(fechaServicio) As primera";
               $sql.=",Max(fechaServicio) As reciente";
               $sql.=",Count(costo) as veces";
               $sql.=" From servicios s ";
               $sql.="  Left join personas p        on p.idPersona=s.idProveedor ";
               $sql.="  Left Join empresaPersona ep On ep.idPersona=p.idPersona";
               $sql.="  Left Join empresas e        On e.idEmpresa=ep.idEmpresa";
               //               $sql.="  Where s.idUsuario=".$this->session->userdata("idUsuario");
               $sql.="  Group By 1";
               $sql.=" Order By 1"; ?>
       <?php $query = $this->db->query($sql);
       ?>
       <?php foreach ($query->result() as $row): ?>
         <tr>
          <td><?php echo $row->proveedor ?></td>
          <td style="text-align:center;"><?php echo $row->primera ?></td>
          <td style="text-align:center;"><?php echo $row->reciente ?></td>
          <td style="text-align:center;"><?php echo $row->veces ?></td>
          </tr>
       <?php endforeach; ?>
       </tbody>
       </table>
       <br />
       </div> 
          