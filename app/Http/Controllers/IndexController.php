<?php

namespace App\Http\Controllers;

use App\Models\Index;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $recentUpload = Index::latest()->limit(4)->get();

        $rawAllVideo = DB::table('videos')->select('videoID', 'videoName', 'videoDescription', 'image', 'created_at')->paginate(20);

        session()->put('activeMenu',  'home');

        return view('index', compact('recentUpload', 'rawAllVideo'));
    }

    public function test()
    {
        return view('test');
    }
}
