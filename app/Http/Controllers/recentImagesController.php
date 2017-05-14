<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageGallery;
use DB;

class recentImagesController extends Controller
{
    public function index(){
		$images = DB::select('select * from image_gallery');
		return view('welcome',['images'=>$images]);
	}

	public function show($id)
    {
         $image = ImageGallery::find($id);
         return view('welcome', array('image' => $image));
    }
}
