<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        session()->put('activeMenu', 'manageVideo');

        $videos = DB::table('videos')
            ->join('categories', 'videos.categoryID', '=', 'categories.categoryID')
            ->select('videos.videoID', 'videos.videoName', 'videos.videoDescription', 'videos.categoryID', 'categories.categoryName', 'videos.created_at', 'videos.updated_at')
            ->paginate(10);

        return view('video.videos', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = DB::table('categories')->Select('categoryID', 'categoryName')->paginate();

        return view('video.addVideo', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'input_videoName',
            'input_category',
            'input_videoDescription',
            'input_videoFile',
            'input_videoThumbnail',
        ]);

        $input = $request->all();

        $input['input_videoThumbnail'] = "defaultCategory.png";

        if ($file = $request->file('input_videoFile')) {

            if ($thumbNail_file = $request->file('input_videoThumbnail')) {
                $destinationPath = 'image/';
                $thumbNail = date('YmdHis') . "." . $thumbNail_file->getClientOriginalExtension();
                $thumbNail_file->move($destinationPath, $thumbNail);
                $input['input_videoThumbnail'] = "$thumbNail";
            }

            $destinationPath = 'videos/';
            $videoFile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $videoFile);
            $input['input_videoFile'] = "$videoFile";

            Video::create([
                'videoName' => $input['input_videoName'],
                'videoDescription' => $input['input_videoDescription'],
                'videoFile' => $input['input_videoFile'],
                'image' => $input['input_videoThumbnail'],
                'categoryID' => $input['input_category']
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
        $files = DB::table('files')->select('fileID', 'fileName', 'file', 'videoID', 'created_at', 'updated_at')->where('videoID', '=', $video->videoID)->paginate();

        $categoryData = DB::table('categories')->select('categoryID', 'categoryName')->where('categoryID', '=', $video->categoryID)->paginate();

        $sameCategoryData = DB::table('videos')->select('videoID', 'videoName', 'videoDescription', 'image', 'created_at')
            ->where([['categoryID', '=', $video->categoryID], ['videoID', '!=', $video->videoID]])
            ->inRandomOrder()
            ->paginate(4);

        $profileID = session()->get('profileID');

        $myRequest = new \Illuminate\Http\Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add([
            'profileID' => $profileID,
            'videoID' => $video->videoID
        ]);

        app('App\Http\Controllers\HistoryController')->store($myRequest);

        return view('video.videoView', compact('video', 'categoryData', 'sameCategoryData', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
        $categories = DB::table('categories')->Select('categoryID', 'categoryName')->paginate();

        $getFilesData = DB::table('files')->select('fileID', 'fileName', 'file', 'created_at')->where('videoID', '=', $video->videoID)->paginate();

        return view('video.editVideo', compact('video', 'categories', 'getFilesData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
        $request->validate([
            'input_videoName',
            'input_category',
            'input_videoDescription',
            'input_videoFile',
            'input_videoThumbnail',
        ]);

        $input = $request->all();

        $video = Video::find($video['videoID']);

        $video->videoName = $input['input_videoName'];
        $video->videoDescription = $input['input_videoDescription'];
        $video->categoryID = $input['input_category'];

        if ($thumbNail_file = $request->file('input_videoThumbnail')) {
            $destinationPath = 'image/';
            if ($video->image != "defaultCategory.png") {
                File::delete($destinationPath . $video->image);
            }
            $thumbNail = date('YmdHis') . "." . $thumbNail_file->getClientOriginalExtension();
            $thumbNail_file->move($destinationPath, $thumbNail);
            $video->image = "$thumbNail";
        }

        if ($file = $request->file('input_videoFile')) {
            $destinationPath = 'videos/';
            File::delete($destinationPath . $video->videoFile);
            $videoFile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $videoFile);
            $video->videoFile = "$videoFile";
        }

        $video->save();

        if ($request->hasFile('input_files')) {
            $files = $request->file('input_files');
            foreach ($files as $file) {
                $name = time() . rand(1, 100) . "." . $file->getClientOriginalExtension();
                $file->move(public_path('files'), $name);

                Files::create([
                    'fileName' => pathinfo($file->getClientOriginalName())['filename'],
                    'file' => $name,
                    'videoID' => $video->videoID
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
        $video->delete();

        if ($video->image != "defaultCategory.png") {
            $destinationPath = 'image/';
            File::delete($destinationPath . $video->image);
        }

        $destinationPath = 'videos/';
        File::delete($destinationPath . $video->videoFile);

        return redirect()->route('video.index')->with('success', 'Video and files was deleted!');
    }
}
