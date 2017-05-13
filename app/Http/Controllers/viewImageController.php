<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageGallery;
use DB;

class viewImageController extends Controller
{
    public function index(){
		$images = DB::select('select * from image_gallery');
		return view('viewAllPics',['images'=>$images]);
	}

	 public function show($id)
    {
         $image = ImageGallery::find($id);
         return view('viewPics', array('image' => $image));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $image = ImageGallery::find($id);
         return view('editPics', array('image' => $image)); 
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
         $make = $request->input('make');
         $model = $request->input('model');
         $produce = $request->input('produced_on');
         DB::update('update cars set make = ?, model=?, produced_on=? where id = ?',[$make, $model, $produce,$id]);
         echo "Record updated successfully.<br/>";
         echo '<a href="cars/">Click Here</a> to go back.';
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        DB::delete('delete from cars where id = ?',[$id]);
        echo "Record deleted successfully.<br/>";
    }
}
