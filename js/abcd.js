
    $(document).ready(function() {
        var oTable = $('#tb2').dataTable({
            
            "oLanguage": {
                "sUrl": "media/espaniol.txt"
            },
            "fnDrawCallback": function( oSettings ) {
                /* Apply the jEditable handlers to the table */
//                oTable.$('td').editable( url_editar, {
//                    "callback": function( sValue, y ) {
//                        alert("hola");
//                        var aPos = oTable.fnGetPosition( this );
//                        oTable.fnUpdate( sValue, aPos[0], aPos[1] );
//                    },
//                    "submitdata": function ( value, settings ) {
//                        return {
//                            "row_id": this.parentNode.getAttribute('idregistro'),
//                            "column": this.getAttribute('campo')
//                        };
//                    },
//                    event     : "dblclick",
//                    "height": "20px",
//                    "width": "100%"
//                } );
               

                /* Botón Eliminar */
                $(".tbl_delete_row").off('click');
                $(".tbl_delete_row").click(function(e){
                    e.preventDefault();
                    if(confirm('Esta seguro de eliminar este registro?')){
                        var row = $(this).closest("tr").get(0);
                        $.get($(this).attr('href'));
                        $('#tb2').dataTable().fnDeleteRow($('#tb2').dataTable().fnGetPosition(row));
                    }
                });
                
                $(".tbl_update_row").off('click');
                $(".tbl_update_row").click(function(e){
                    e.preventDefault();
                    if(confirm('Esta seguro de asignar este registro?')){
                        var row = $(this).closest("tr").get(0);
                        $.get($(this).attr('href'));
                        alert("Registro actualizado recargar");
                        dialog_compartir.dialog( "close" );
                    }
                });
              }
        });
     
    
                                
        $("#btn_nuevo").click(function(){
            $("#nuevo").toggle("blind");
            if($("#nuevo").is(":visible"))
                $(this).hide("blind");
        });
                                
        $("#form_nuevo").submit(function(){
            $.post(this.action, $(this).serialize()).done(function(id){
                $("#aviso_ok .aviso_contenido").html('La empresa se ha guardado correctamente');
                var data = new Array();
                var fields = $("#form_nuevo").serializeArray();
                                        
                jQuery.each(fields, function(i, field){
                    data.push(field.value);
                });
                var btns = '<a href="' + url_borrar + '/' + id + '" class="tbl_delete_row"><img src="/img/delete-icon.png" width="18"></a>';
                data.push(btns);
                $('#tb2').dataTable().fnAddData(data);
                $("#form_nuevo").get(0).reset();
                $('#aviso_ok').slideDown(600).delay(2000).slideUp(500);
                $("#nuevo").hide("blind");
                $("#btn_nuevo").show("blind");
            });
                                    
            return false;
        });
                                
//        $(".tbl_delete_row").on('click',function(e){
//            e.preventDefault();
//            if(confirm('Esta seguro de eliminar este registro?')){
//                var row = $(this).closest("tr").get(0);
//                $('#tbl').dataTable().fnDeleteRow($('#tbl').dataTable().fnGetPosition(row));
//            }
//        });
    } );
    
//    $(document).on("click", ".tbl_delete_row", function(e){
//            e.preventDefault();
//            if(confirm('Esta seguro de eliminar este registro?')){
//                var row = $(this).closest("tr").get(0);
//                $('#tbl').dataTable().fnDeleteRow($('#tbl').dataTable().fnGetPosition(row));
//            }
//        });