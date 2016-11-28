<?php
namespace App\Http\Controllers;
use App\Picture;
use Illuminate\Http\Request;
class IndexController
{
    public function index()
    {
        $picture = Picture::all();
        return view('index', ['slike' => $picture
        ]);
        
    }
    
}