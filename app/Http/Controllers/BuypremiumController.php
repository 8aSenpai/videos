<?php

namespace videos\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BuypremiumController extends Controller
{
    public function view(){
    	$premium = DB::table('premium')
    		->get();
    	return view('buy_premium', ['premium' => $premium]);
    }
}
