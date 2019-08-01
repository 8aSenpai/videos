<?php

namespace videos\Http\Controllers;

use Illuminate\Http\Request; 
Use Auth;
Use Image;
Use DB;
class SubirController extends Controller
{
    public function view(){
    	return view('usuarios.subir');
    }
    public function editar(Request $request){
    	/* Thumbnail */
    	if($request->hasFile('thumbnail')){
            $post_image = $request->file('thumbnail');
            $filename = time() . '.' . $post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(600, 300)->save( public_path('/uploads/thumbnails/' . $filename ) );   
        }
    	/* Video */
    	if($request->hasFile('video')){

            $file = $request->file('video');
            //$filename2 = $file->getClientOriginalName();
            $filename2 = time() . '.' . $file->getClientOriginalName();
            $destinationPath = 'uploads/videos'; 
    		$uploadSuccess = $file->move($destinationPath, $filename2);
    		$videoSrc = '/'.$destinationPath.'/'.$filename2;
        }
        /**************/
        $user_id = Auth::user()->id;
        $title = $request->input('titulo');
        $tag = $request->input('tags');
        $rtag = explode(",", $tag);
        $tot = count($rtag);  
        $desc = $request->input('descripcion');
        $image = $request->input('post_image'); 
        //Upload Tags
        for($i=0;$i<=$tot-1;$i++){ 
            $tag_result = DB::table('tags')
            ->where('name', '=', $rtag[$i])
            ->count();
            if(empty($tag_result)){
                DB::insert('insert into tags(name) VALUES (?)', [$rtag[$i]]);
            }
        }
        //Upload Video
        DB::insert('insert into videos(name, description, thumbnail, file, id_user) VALUES (?, ?, ?, ?, ?)', [$title, $desc, $filename, $filename2, $user_id]);

        //Upload Relationship
        //Get id item
        $item = DB::table('videos')
            ->where('file', '=', $filename2)
            ->first();
        $item_id = $item->id_video;

        for($i=0;$i<=$tot-1;$i++){ 
            //Get id tag
            $seltag = DB::table('tags')
            ->where('name', '=', $rtag[$i])
            ->first();
            $tag_id = $seltag->id_tag;
            DB::insert('insert into videotag(id_video, id_tag) VALUES (?, ?)', [$item_id, $tag_id]);
        }



        //Video Uploaded
        $status = 'TU VIDEO DE HA SUBIDO CORRECTAMENTE!!!';
        //return view('posts.create_post', compact('status'));
        return view('usuarios.subir')->with('status',$status);
    }
}
