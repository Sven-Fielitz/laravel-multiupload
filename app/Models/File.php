<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;

    /***
     * Gibt den Dateinamen zurück
     */
    public function getFilename() {

        return $this->filename . '.' .  $this->filetype;

    }

    /***
     * Gibt den Downloadlink zurück
     */
    public function getDownloadLink() {

        return url("storage/uploads/". $this->getFilename());

    }

    /***
     * Gibt den Speicherpfad zurück
     */
    public function getStoragePath() {

        return Storage::disk('public')->path(config("app.uploadPath"). $this->getFilename());
      

    }

    /***
     * Speichert und generiert einen zufälligen Dateinamen für den Speicherpfad
     */
    public function setRandomFileName()  {
        
        //Mögliche race condition beachten. - Locktable
        DB::raw('LOCK TABLES files WRITE');
        $this->filename = SELF::getRandomFileName();
        $this->save();
        DB::raw('UNLOCK TABLES');
        return $this->filename;

    }

    /***
     * Generiert einen freien Dateinamen für Uploads 
     */
    public static function getRandomFileName() {

        $maxInterrations = 100;
        for ($i=0; $i<$maxInterrations; $i++) {
            $randomeFileName = randomString();

            //Verfüfbarkeit prüfen
            if(SELF::where("filename", "=", $randomeFileName)->count() == 0) {

                return $randomeFileName;
 
            }

        }
        return null;
    }

    /***
     * Prüft den SHA256-Hash der Datei
     */
    public function checkFileHash($path = null) {

        if(empty($path)) $path = $this->getStoragePath();
        if(!file_exists($path)) return false;

        return hash_file("sha256", $path) === $this->filehash;

    }

}
