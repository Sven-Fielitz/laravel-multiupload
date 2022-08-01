$( document ).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#UploadedFiles").dataTable({
        responsive: true
    });

});

//Angabe in MB (x * 1.000.000 Byte)
var maxFilesize = 5;

Dropzone.options.fileupload =  {
    complete: function(file) {

        //Prüfe, ob die Warteschlange abgearbeitet ist
        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {

            setTimeout(function() {
                location.reload();
            }, 800);

        }

    },
    error(file, message) {
        alert("Beim Upload der Datei " +  file.name + " ist folgender Fehler aufgetreten: " + message);
    },
    accept: function(file, done) {
        
        //Da das Dateilimit bei 5 MB und nicht bei 5 MiB liegen soll, wird hier manuell geprüft.
        //Die Option maxFilesize von Dropzone.js kann nur in MiB angegeben werden und ist daher zu ungenau.

        if(file.size <= maxFilesize * 1000 * 1000) {
            done();
        } else {
            done("Die Datei ist zu groß. Die maximale Dateigröße beträgt " + maxFilesize + " MB");
        }

    },
    sending: function(file, xhr , formData) {

        //Erstellen der Upload-ID
        var result = $.ajax({
            type: "POST",
            url: "/api/file/upload/announce",
            data: {
                filesize: file.size,
                filename: file.name,
            },
            dataType: "json",
            async: false
        }).responseJSON;

        if(result.status == "ok") {
            formData.append("id", result.id)
        }
    },
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    'acceptedFiles': '.jpg, .jpeg, .png, .gif, .pdf',
    'dictDefaultMessage': 'Legen Sie Dateien hier ab um Sie hochzuladen<br>(Maximal ' + maxFilesize + ' MB - Erlaubt sind Bilder und PDFs)',
    'dictFallbackMessage': 'Ihr Browser unterstützt Drag&Drop Dateiuploads nicht',
    'dictFallbackText': 'Benutzen Sie das Formular um Ihre Dateien hochzuladen',
    'dictInvalidFileType': 'Eine Datei dieses Typs kann nicht hochgeladen werden',
    'dictResponseError': 'Der Server hat ihre Anfrage mit Status {{statusCode}} abgelehnt',
    'dictCancelUpload': 'Hochladen abbrechen',
    'dictCancelUploadConfirmation': null,
    'dictRemoveFile': 'Datei entfernen',
    'dictMaxFilesExceeded': 'Sie können keine weiteren Dateien mehr hochladen'
};
