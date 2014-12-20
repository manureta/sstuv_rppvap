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
                var borrar = "<button class='btn-sm btn-danger delete' href=# class='borrar_archivo' data-type="+file.deleteType+" data-url="+file.deleteUrl+"><i class='icon icon-trash'></i></button>";
                $('#files').append("<p>"+link+borrar+"</p>");

            });
        });      

    $(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            /*
            $.each(data.result.files, function (index, file) {
            var link ="<a href="+file.url+" title="+file.name+" download="+file.name+">"+file.name+"</a>";
            var borrar = "<div class='borrar_archivo' data-type="+file.deleteType+" data-url="+file.deleteUrl+"><i class='icon icon-trash'></i><span>Borrar</span></div>";
            $('#files').append("<p>"+link+borrar+"</p>");

            });
            */
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


   $('.borrar_archivo').on('click', function(event) {
    event.preventDefault(); // To prevent following the link (optional)
        alert("xx");
    });

}
