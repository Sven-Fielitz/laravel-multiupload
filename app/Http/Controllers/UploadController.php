<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

use App\Models\File;

class UploadController extends Controller
{

    protected $allowedFileExtensions = ["jpg", "jpeg", "png", "gif", "pdf"];
    protected $maxFilesize = 5; //Angabe in MB (x * 1.000.000 Byte)

    /**
     *  Speichern des Datenuploads und Konsistenzprüfung anstoßen
     */
     function receive(Request $request) {
        $response["status"] = "error";
        $statusCode = 500; // HTTP-Status - Default auf internal server error
        

        if($request->has("id") && $request->hasFile("file")) {
            $file = File::find($request->input("id"));
            $uploadedFile = $request->file('file');

            //Validierung des Uplaods
            if(empty($file) || (!empty($file) && $file->status != "ANNOUNCED")) {
                
                $response["error_message"] = "Upload not announced";
                $statusCode = 400;

            } else if($uploadedFile->getClientOriginalName() != $file->orginal_filename && $uploadedFile->getSize() != $file->fileSize) {

                $response["error_message"] = "Upload wrong announced";
                $statusCode = 400;

            } else if(!$uploadedFile->isValid()) {

                $response["error_message"] = "File invalid";
                $statusCode = 400;

            } else {
                
                //Upload verarbeitung und Abspeichern
                $path = $uploadedFile->storeAs("/uploads",  $file->getFilename(), "public");

                $file->status = "COMPLETED";
                $file->uploaded_at = Carbon::now();
                $file->save();

                $response["status"] = "ok";
                $response["type"] = $uploadedFile->extension();
                $statusCode = 200;

            }

            //CORRUPTED Status setzen 
            if(!empty($response["error_message"]) && $file->status != "COMPLETED") {

                $file->status = "CORRUPTED";
                $file->save();

            }

        } else {

            $response["error_message"] = "Wrong API call";
            $statusCode = 400;

        }

        return response()->json($response, $statusCode);
    }

    /**
     *  Erstellung des Dateieintrags in der Datenbank und
     *  erfassung erster Metadaten
     */
    public function announce(Request $request) {
        $response["status"] = "error";
        $statusCode = 500; // HTTP-Status - Default auf internal server error

        if($request->has(["filesize", "filename"])) {

            $fileExtension = @pathinfo($request->input("filename"))["extension"];

            if($request->input("filesize") > $this->maxFilesize * 1000 * 1000) {

                $response["error_message"] = "File exceeds upload limit (".$this->maxFilesize." MB)";
                $statusCode = 400;

            } else if(!in_array($fileExtension, $this->allowedFileExtensions)) {

                $response["error_message"] = "Not allowed file type";
                $statusCode = 400;

            } else {

                $file = new File();
                $file->orginal_filename = $request->input("filename");
                $file->filetype = $fileExtension;
                $file->fileSize =  $request->input("filesize");
                $file->status = "ANNOUNCED";
                $file->save();
                $file->setRandomFileName();
                
                $response["status"] = "ok";
                $response["id"] = $file->id;
                $response["filename"] = $file->getFilename();
                $statusCode = 200;
            }
        } else {

            $response["error_message"] = "Wrong API call";
            $statusCode = 400;
        }
        return response()->json($response, $statusCode);
    }

}
