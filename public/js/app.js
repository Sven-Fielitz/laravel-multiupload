$( document ).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('fileupload').dropzone({ url: "/file/post" });;

    $("#UploadedFiles").dataTable({
       
    });

});

Dropzone.options.fileupload =  {
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    'maxFilesize': 5,
    'dictDefaultMessage': 'Legen Sie Dateien hier ab um Sie hochzuladen<br>(Maximal 5 MB)',
    'dictFallbackMessage': 'Ihr Browser unterstützt Drag&Drop Dateiuploads nicht',
    'dictFallbackText': 'Benutzen Sie das Formular um Ihre Dateien hochzuladen',
    'dictFileTooBig': 'Die Datei ist zu groß. Die maximale Dateigröße beträgt {{maxFileSize}}MB',
    'dictInvalidFileType': 'Eine Datei dieses Typs kann nicht hochgeladen werden',
    'dictResponseError': 'Der Server hat ihre Anfrage mit Status {{statusCode}} abgelehnt',
    'dictCancelUpload': 'Hochladen abbrechen',
    'dictCancelUploadConfirmation': null,
    'dictRemoveFile': 'Datei entfernen',
    'dictMaxFilesExceeded': 'Sie können keine weiteren Dateien mehr hochladen'
};