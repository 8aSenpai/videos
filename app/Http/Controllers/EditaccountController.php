<?php

namespace videos\Http\Controllers;

use Illuminate\Http\Request; 
Use Auth;
Use Image;
Use DB;
class EditaccountController extends Controller
{
    public function view(){
    	return view('usuarios.cuenta');
    }
    public function editar(Request $request){

    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
			$user = Auth::user();
			$user->avatar = $filename;
			$user->save(); 
    	}
    	$nick = Auth::user()->nick;
    	$nombre = $request->input('nombre');
    	$email = $request->input('email');
    	DB::table('users')
            ->where('nick', $nick)
            ->update(['name' => $nombre]); 
		return back();
    }
}
