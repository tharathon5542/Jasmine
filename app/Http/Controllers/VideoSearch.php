<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoSearch extends Controller
{
    //
    public function index()
    {
        $keyword = "";

        $videos = DB::table('videos')
            ->select('videoID', 'videoName', 'videoDescription', 'image', 'updated_at')->paginate(20);

        session()->put('activeMenu',  'search');

        return view('video.videoSearch', compact('videos', 'keyword'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'input_keyword'
        ]);

        $input = $request->all();

        $keyword = $input['input_keyword'];

        $videos = DB::table('videos')
            ->select('videoID', 'videoName', 'videoDescription', 'image', 'updated_at')
            ->where('videoName', 'LIKE', '%' . $keyword . '%')
            ->orWhere('videoDescription', 'LIKE', '%' . $keyword . '%')
            ->paginate(999);

        return view('video.videoSearch', compact('videos', 'keyword'));
    }
}
