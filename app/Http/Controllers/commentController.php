<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\File;

class commentController extends Controller
{

    /**
     * Eingabemaske für die Bemerkung erzeugen
     */
    public function edit(Request $request, $id)
    {

        $file = File::find($id);
        return view("comment", compact("file"));

    }

    /**
     * Speichern der Bemerkung und zur Startseite weiterleiten mit einer Flash-Message
     */
    public function update(Request $request, $id)
    {
        $file = File::find($id);
        if(!empty($file) && $request->has("comment")) {

            $file->comment = $request->input("comment");
            $file->save();
            return redirect("/")->with('message.success', 'Kommentar erfolgreich gespeichert.');

        }
        return redirect("/")->with('message.error', 'Kommentar konnte nicht gespeichert werden!');
        
    }
    
}
