<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageGallery;
use App\views;
use App\likes;
use DB;

class homeIndexController extends Controller
{
    public function index(){
		$images = DB::select('SELECT g.id,g.title,g.description,g.image,g.created_at, v.views, l.likes FROM image_gallery g INNER JOIN views v on g.id = v.pid INNER JOIN likes l on g.id = l.pid ORDER BY g.created_at DESC LIMIT 6 ');
        //$images = DB::table('image_gallery')->latest()->limit(6)->get();
		return view('welcome',['images'=>$images]);
	}

	public function update($id)
    {
         /*$image = ImageGallery::find($id);
         return view('view', array('image' => $image));
         */
         $msg = "This is a simple message." . $id;
        return response()->json(array('msg'=> $msg), 200);
    }

   
}