<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoByCategoryController extends Controller
{
    //
    public function index($categoryID)
    {
        $videos = DB::table('videos')
            ->select('videoID', 'videoName', 'videoDescription', 'image', 'updated_at')
            ->where('categoryID', '=', $categoryID)
            ->paginate(20);

        $categoryName = Category::find($categoryID);

        return view('video.videoByCategory', compact('videos', 'categoryName'));
    }
}
