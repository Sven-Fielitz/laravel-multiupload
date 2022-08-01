<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

}
