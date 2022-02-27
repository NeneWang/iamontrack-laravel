<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Image;
use App\Userdatum;
use App\Objective;

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
        $userDatum = Userdatum::first();
        $userDatum->last_update=$request->lastupdate;
        $userDatum->current_streak=$request->currentstreak;
        $userDatum->save();
    }

    public function getCurrentStreak(){
        $userDatum = Userdatum::first();
        $response = json_encode(array("current-streak"=> $userDatum->current_streak));
        return response($userDatum->current_streak, 200);
    }

    public function getDaysLeft(){
        $userDatum = UserDatum::first();
        $currentTime = Carbon::now();
        $lastUpdate = Carbon::parse($userDatum->last_update);
        $response = json_encode(array("days-left"=> $lastUpdate->diffInDays($currentTime)));
        return response($lastUpdate->diffInDays($currentTime), 200);
    }

    public function postObjective(REQUEST $request){
        $task = Objective::insert([
            'user_id'=> 1,
            'title'=> $request->title,
            ]);
            return DB::getPdo()->lastInsertId();
    }

    public function getObjectivesNames(){
        $objectives = Objective::get();
        $mappedobjectives = $objectives->map(function($item, $key){
            return $item->title;
        });
        return response(json_encode($mappedobjectives), 200);
    }



    
}