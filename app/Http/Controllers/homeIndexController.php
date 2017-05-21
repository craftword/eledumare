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

	public function view($id)
    {
         $image = ImageGallery::find($id);              
         return response()->json(array('image'=> $image), 200);
         
         
    }




    public function updateLikes(Request $request, $id)
    {
        $totalLikes = DB::table('likes')->select('likes')->where('pid', '=', $id)->get();
        $updatedLikes = $totalLikes[0]->likes + 1;
        DB::table('likes')->where('pid', '=', $id)->update(['likes' => $updatedLikes]);
         //$image->save();
         //$msg = "likes updated successfully";
         return response()->json(array('msg'=>$updatedLikes), 200);
         
         
    }

    public function updateViews(Request $request, $id)
    {
         $views = views::find($id);
         $views->views = $request->input('views');
         $image->save();

             
    }
   
}