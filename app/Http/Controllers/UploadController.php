<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

use App\Models\File;

class UploadController extends Controller
{

    /**
     *  Speichern des Datenuploads und Konsistenzprüfung anstoßen
     */
    function receive(Request $request) {
        $response = null;
        $statusCode = 500; // HTTP-Status - Default auf internal server error

        if($request->has(["id"] && $request->hasFile("file"))) {

            $response["status"] = "ok";
            $statusCode = 200;

        } else {
            $response["status"] = "error";
            $response["message"] = "Wrong API call";
            $statusCode = 400;

        }
        return response()->json($response, $statusCode);
    }

    /**
     *  Erstellung des Dateieintrags in der Datenbank und
     *  erfassung erster Metadaten
     */
    function announce(Request $request) {
        $response = null;
        $statusCode = 500; // HTTP-Status - Default auf internal server error

        if($request->has(["filesize", "filename"])) {
            $file = new File();
            $file->orginal_filename = $request->input("filename");
            $file->fileSize =  $request->input("filesize");
            $file->status = "ANNOUNCED";
            $file->save();

            $response["status"] = "ok";
            $response["id"] = $file->id;
            $statusCode = 200;
        } else {
            $response["status"] = "error";
            $response["message"] = "Wrong API call";
            $statusCode = 400;
        }
        return response()->json($response, $statusCode);
    }

}
