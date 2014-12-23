function uploadManager(url,div,div_files)
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
                $(div_files).append("<p>"+link+borrar+"</p>");

            });

            $('.borrar_archivo').on('click', Borrar);

        });      

    $(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    
    $(div).fileupload({
        url: url,
        dataType: 'json',
        done: function (e,data) {
            var archivo=data._response.result.files[0];
            if(archivo.error){
                    alert(archivo.error);
            }else{
                var link ="<a href="+archivo.url+" title="+archivo.name+" download="+archivo.name+">"+archivo.name+"</a>";
                var borrar = "<button class='borrar_archivo' data-type="+archivo.deleteType+" data-url="+archivo.deleteUrl+"><i class='icon icon-trash'></i></button>";
                $(div_files).append("<p>"+link+borrar+"</p>");    
                $('.borrar_archivo').on('click', Borrar);
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

   
function verAdjuntados(url,div_files){
$.ajax({
            url: url,
            dataType: 'json'            
        }).done(function (data) {
            
            $.each(data.files, function (index, file) {
                var link ="<a href="+file.url+" title="+file.name+" download="+file.name+">"+file.name+"</a>";                
                $(div_files).append("<p>"+link+"</p>");

            });            
        });
}

function Borrar(e) {                
  e.preventDefault();
  var accion_borrar=confirm("Esta acción no se puede deshacer, está seguro ?");
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
}