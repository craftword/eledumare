<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ImageGallery;
use DB;
use Illuminate\Http\RedirectResponse;
use App\likes;
use App\views;

class viewImageController extends Controller
{   

    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
		$images = DB::select('select * from image_gallery');
        return view('Admin.viewListOfImages',['images'=>$images]);
	}

	 public function show($id)
    {
         $image = ImageGallery::find($id);
         return view('Admin.viewImage', array('image' => $image));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $image = ImageGallery::find($id);
         return view('Admin.editImage', array('image' => $image)); 
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
         $image = ImageGallery::find($id);
         $image->title = $request->input('title');
         $image->description = $request->input('description');
         $image->tag = $request->input('tag');

        $image->save();

        // redirect
        return Redirect::to('listTable');

        /*DB::update('update cars set make = ?, model=?, produced_on=? where id = ?',[$make, $model, $produce,$id]);
         echo $title . "----". $description. "---". $tag . "---". $id."<br />";
         echo "Record updated successfully.<br/>";
         echo '<a href="cars/">Click Here</a> to go back.';*/
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
       $image = ImageGallery::find($id); 
       $likes = likes::where('pid', '=', $id)->firstOrFail();
       $views = views::where('pid', '=', $id)->firstOrFail();

       echo $likes->likes;
       echo $views->views;

       // Delete a single file
       /* unlink($image->image);

       $image->delete();
       $likes->delete();
       $views->delete();
        */
       
    }
}
