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

    public function create()
    {
        return view('Admin.addImage');
    }


    public function store(Request $request)
    {
        $title = $request->input('title');
            $description = $request->input('description');
            $tag = $request->input('tag');
            $file = $request->file('image');

            $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
                // views and likes tables
                
                //Move Uploaded File
                $destinationPath = 'img/portfolio';
                $path = $destinationPath."/".$file->getClientOriginalName();
                $file->move($destinationPath,$file->getClientOriginalName());
                
                $id = DB::table('image_gallery')->insertGetId(
                    ['title' => $title, 'description' => $description, 'image' => $path, 'tag' => $tag]
                    );
                DB::table('views')->insert(
                    ['pid' => $id, 'views' => 0]
                );

                DB::table('likes')->insert(
                    ['pid' => $id, 'likes' => 0]
                );
                
                // redirect
                 return back()->with('status','Image Upload successful');
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
         return redirect('listTable')->with('status', 'Image updated sucessfully!');

        
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

       // Delete a single file
        unlink($image->image);

       $image->delete();
       $likes->delete();
       $views->delete();
        
      // redirect
         return redirect('listTable')->with('status', 'Image deleted sucessfully!');  
    }
}
