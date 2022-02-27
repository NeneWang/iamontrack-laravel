<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Image;
use App\Userdatum;

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

    public function postUserDatum(REQUEST $request){
        $userDatum = new UserDatum();
        $userDatum->$last_update->lastupdate;
        $userDatum->$current_streak->currentstreak;
        $userDatum->save();
    }

    public function getCurrentStreak(){
        $userDatum = Userdatum::first();
        $response = json_encode(array("current-streak"=> $userDatum->current_streak));
        return response($response, 200);
    }

    public function getDaysLeft(){
        $userDatum = UserDatum::first();
        $currentTime = Carbon::now();
        $lastUpdate = Carbon::parse($userDatum->last_update);
        $response = json_encode(array("days-left"=> $lastUpdate->diffInDays($currentTime)));
        return response($response, 200);
    }



    
}