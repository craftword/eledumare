<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ImageGallery;
use App\views;
use App\likes;
use DB;

class addImageController extends Controller
{
    public function index(){
		return view('Admin.addImage');
	}

	public function storeImage(Request $request){

			$title = $request->input('title');
			$description = $request->input('description');
			$tag = $request->input('tag');
			$file = $request->file('image');

			// views and likes tables
			
			//Move Uploaded File
			$destinationPath = 'img/portfolio';
			$path = $destinationPath."/".$file->getClientOriginalName();
			$file->move($destinationPath,$file->getClientOriginalName());
			//DB::insert('insert into image_gallery (title, description, image, tag) values(?,?,?,?)', [$title, $description, $path, $tag]);
			$id = DB::table('image_gallery')->insertGetId(
    			['title' => $title, 'description' => $description, 'image' => $path, 'tag' => $tag]
				);
			DB::table('views')->insert(
			    ['pid' => $id, 'views' => 0]
			);

			DB::table('likes')->insert(
			    ['pid' => $id, 'likes' => 0]
			);
			
			$response = array(
	                'status' => 'success',
	                'msg' => 'Setting created successfully',
	            );
	            return \Response::json($response);
        
	}
}
