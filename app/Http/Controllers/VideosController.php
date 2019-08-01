<?php

namespace videos\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class VideosController extends Controller
{
    public function ver(){
    	$id = request()->id;
    	$videos = DB::table('videos')
 		->where('id_video', '=', $id)
    	->get();
        return view('videos', ['videos' => $videos]);
    }
}
