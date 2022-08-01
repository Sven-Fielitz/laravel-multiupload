<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\File;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::where("status", "=", "COMPLETED")->get();
        return view("index", compact("files"));
    }

}
