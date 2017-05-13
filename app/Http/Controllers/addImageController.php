<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageGallery;
use DB;

class addImageController extends Controller
{
    public function index(){
		return view('addImage');
	}

	public function storeImage(Request $request){

			$title = $request->input('title');
			$description = $request->input('description');
			$tag = $request->input('tag');
			$file = $request->file('image');
			
			//Move Uploaded File
			$destinationPath = 'img/portfolio';
			$path = $destinationPath."/".$file->getClientOriginalName();
			$file->move($destinationPath,$file->getClientOriginalName());
			DB::insert('insert into image_gallery (title, description, image, tag) values(?,?,?,?)', [$title, $description, $path, $tag]);
			$response = array(
	                'status' => 'success',
	                'msg' => 'Setting created successfully',
	            );
	            return \Response::json($response);
        
	}
}
