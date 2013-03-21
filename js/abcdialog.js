
    $(document).ready(function() {
        if($("#dia").length > 0) {
            $("#dia").dialog("destroy");
            $("#dia").remove();
        }
        
        var dia = $("<div />").attr("id","dia").dialog({ 
            autoOpen: false,
            modal: true,
            minWidth: 600,
            minHeight: 400
        });
        
        var oTable = $('#tbl').dataTable({
            
            "oLanguage": {
                "sUrl": "media/espaniol.txt"
            },
            "sScrollX": "100%",
		"sScrollXInner": "100%",
                height: 600,
                width: 12,
		"bScrollCollapse": true
        });
     
     $("#tbl > tbody > tr").on('dblclick', function(){
         var idregistro = $(this).attr("idregistro");
         dia.html("");
         $("#ajax-loader").clone().appendTo(dia).show();
         dia.dialog("open");
         dia.load(url_ver + "/" + idregistro);
         
     });
    
                                
        $("#btn_nuevo").click(function(){
            $("#nuevo").toggle("blind");
            if($("#nuevo").is(":visible"))
                $(this).hide("blind");
        });
                                
        $("#form_nuevo").submit(function(){
            $.post(this.action, $(this).serialize()).done(function(id){
                $("#aviso_ok .aviso_contenido").html('El registro se ha guardado correctamente');
                var data = new Array();
                var fields = $("#form_nuevo").serializeArray();
                                        
                jQuery.each(fields, function(i, field){
                    data.push(field.value);
                });
                var btns = '<a href="' + url_borrar + '/' + id + '" class="tbl_delete_row"><img src="/img/delete-icon.png" width="18"></a>';
                data.push(btns);
                $('#tbl').dataTable().fnAddData(data);
                $("#form_nuevo").get(0).reset();
                $('#aviso_ok').slideDown(600).delay(2000).slideUp(500);
                $("#nuevo").hide("blind");
                $("#btn_nuevo").show("blind");
            });
                                    
            return false;
        });
    } );