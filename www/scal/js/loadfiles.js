/**
 * Created by Администратор on 11.11.2016.
 */
function loadfiles(id){
    var data = new FormData();
    jQuery.each(jQuery('#loadfiles')[0].files, function(i, file) {
        data.append('file-' + i, file);
    });
    $.ajax({
        url: './files.php?id='+id+'&uploadfiles',
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function( respond, textStatus, jqXHR ){
            if( typeof respond.error === 'undefined' ){
                var files_path = respond.files;
                var html = '';
                $.each( files_path, function( key, val ){ html += val +'<br>'; } )
                $('.ajax-respond').html( html );
            }
            else{
                console.log('ОШИБКИ ОТВЕТА сервера: ' + respond.error );
            }
        },
        error: function( jqXHR, textStatus, errorThrown ){
            console.log('ОШИБКИ AJAX запроса: ' + textStatus );
        }
    });
};