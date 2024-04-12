var fileobj;
function upload_file(e, doc) {
    e.preventDefault();
    fileobj = e.dataTransfer.files[0];
    ajax_file_upload(fileobj, doc);
}
 
function file_explorer(id) {
    document.getElementById(id).click();
    document.getElementById(id).onchange = function() {
        fileobj = document.getElementById(id).files[0];
        doc = document.getElementById(id).getAttribute('data');
        ajax_file_upload(fileobj, doc);
    };
}
 
function ajax_file_upload(file_obj, doc) {
    if(file_obj != undefined) {
        var form_data = new FormData();                  
        form_data.append('file', file_obj);
        form_data.append('tipo', doc);
        $.ajax({
            type: 'POST',
            url: 'Aspirantes/subirArchivo',
            contentType: false,
            processData: false,
            data: form_data,
            success:function(response) {
                var respuesta = JSON.parse(response);
                alert(respuesta['mensaje']);
            }
        });
    }
}