<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Image;

use Illuminate\Http\Request;

class apiController extends Controller
{
    public function uploadImage(REQUEST $request){
    $image = $request->image;
    
    $img = base64_decode($image);
    
    $image = $request->name;
    file_put_contents($image, $img);

    DB::table('image')->insert(['image'=> $image,]);
    
    // $conn->query("insert into upload (image) values('".$image."')");
    }
}