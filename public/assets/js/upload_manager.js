function uploadManager(url)
{


    $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: url,
            dataType: 'json'            
        }).done(function (data) {
            
            $.each(data.files, function (index, file) {
                var link ="<a href="+file.url+" title="+file.name+" download="+file.name+">"+file.name+"</a>";
                var borrar = "<button class='borrar_archivo' data-type="+file.deleteType+" data-url="+file.deleteUrl+"><i class='icon icon-trash'></i></button>";
                $('#files').append("<p>"+link+borrar+"</p>");

            });

            $('.borrar_archivo').on('click', function(e) {                
              e.preventDefault();
              var accion_borrar=confirm("Está seguro de borrar este archivo?. Esta acción no se puede deshacer");
              if(accion_borrar){
                // borrar archivo
                var url_file=$(this).data("url");
                var file_method=$(this).data("type"); 
                $.ajax({
                         url: url_file,
                         method: file_method
                        });
                // quitar de la lista
                $(this).parent().fadeOut();  
              }
            });

        });      

    $(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e,data) {
            
            if(data._response.result.files[0].error){
                    alert(data._response.result.files[0].error);
            }else{
                $.each(data.files, function (index, file) {
                    
                        var link ="<a href="+file.url+" title="+file.name+" download="+file.name+">"+file.name+"</a>";
                        var borrar = "<button class='borrar_archivo' data-type="+file.deleteType+" data-url="+file.deleteUrl+"><i class='icon icon-trash'></i></button>";
                        $('#files').append("<p>"+link+borrar+"</p>");    
                });
            }
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });



}

   
function verAdjuntados(url){
$.ajax({
            url: url,
            dataType: 'json'            
        }).done(function (data) {
            
            $.each(data.files, function (index, file) {
                var link ="<a href="+file.url+" title="+file.name+" download="+file.name+">"+file.name+"</a>";                
                $('#files').append("<p>"+link+"</p>");

            });            
        });
}