<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $url = "https://api1.yru.ac.th/profile/v1/users?include=journals,articles&paginate_false=true";

        $content = file_get_contents($url);
        $data = json_decode($content);
        return view('person.index');
    }
    public function show($id)
    {
        $url = "https://api1.yru.ac.th/profile/v1/users?include=journals,articles&paginate_false=true";

        $content = file_get_contents($url);
        $data = json_decode($content);
        return view('person.show',compact('data'));
    }



}
