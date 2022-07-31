<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\File;

class UploadController extends Controller
{
    /**
     *  Speichern des Datenuploads und Konsistenzprüfung anstoßen
     */
    function receive(Request $request) {


    }

    /**
     *  Erstellung des Dateieintrags in der Datenbank und
     *  erfassung erster Metadaten
     */
    function announce(Request $request) {
        $response = null;

        if($request->has(["filesize", "filename"])) {
            $file = new File();
            $file->orginal_filename = $request->input("filename");
            $file->fileSize =  $request->input("filesize");
            $file->status = "ANNOUNCED";
            $file->save();

            $response["status"] = "ok";
            $response["id"] = $file->id;
        } else {
            $response["status"] = "error";
            $response["message"] = "Wrong API call";
        }

        return $response;
    }

}
