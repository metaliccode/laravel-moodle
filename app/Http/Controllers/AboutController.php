<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about', [
            "title" => "About",
            "nama" => "Ihsan Miftahul Huda",
            "job" => "Backend Developer",
            "desc" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt hic veniam optio quibusdam ullam ex unde."
        ]);
    }
}
