<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ImageGallery;
use App\User;
use App\likes;
use App\views;
use DB;


class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         $countViews = 0;
         $countLikes = 0;
        // get all views rows and counts
        foreach (views::all() as $views)
            {
               $countViews = $countViews  +  $views->views;
            }
        //get all likes rows and counts
        foreach (likes::all() as $likes)
            {
               $countLikes = $countLikes  +  $likes->likes;
            }

        $countImages = ImageGallery::get()->count();
        $countUsers =  User::get()->count();
        
         return view('Admin.admin', ['usersCounts' => $countUsers, 'imagesCount' => $countImages, 'views' => $countViews, 'likes'=>$countLikes]);
    }

    
}
