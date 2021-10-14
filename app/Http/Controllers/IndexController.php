<?php

namespace App\Http\Controllers;

use App\Models\Index;
use Illuminate\Support\Facades\DB;
use App\Includes\VideoStream;

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

    public function GamesShow($unit = 1, $subUnit = 1)
    {
        session()->pull('activeMenu');

        $game = "";

        if ($unit == 1) {
            switch ($subUnit) {
                case 1:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit1%2Fscript_00001.emt.xml&title=Lesson+1";
                    break;
                case 2:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit1%2Fscript_00002.emt.xml&title=Lesson+2";
                    break;
                case 3:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit1%2Fscript_00003.emt.xml&title=Lesson+3";
                    break;
                case 4:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit1%2Fscript_00004.emt.xml&title=Lesson+4";
                    break;
                case 5:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit1%2Fscript_00005.emt.xml&title=Lesson+5";
                    break;
                case 6:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit1%2Fscript_00006.emt.xml&title=Lesson+6";
                    break;
                case 7:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit1%2Fscript_00007.emt.xml&title=Lesson+7";
                    break;
                case 8:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit1%2Fscript_00008.emt.xml&title=Lesson+8";
                    break;
            }
        } else if ($unit == 2) {
            switch ($subUnit) {
                case 1:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit2%2Fscript_00001.emt.xml&title=Lesson+1";
                    break;
                case 2:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit2%2Fscript_00002.emt.xml&title=Lesson+2";
                    break;
                case 3:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit2%2Fscript_00003.emt.xml&title=Lesson+3";
                    break;
                case 4:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit2%2Fscript_00004.emt.xml&title=Lesson+4";
                    break;
                case 5:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit2%2Fscript_00005.emt.xml&title=Lesson+5";
                    break;
                case 6:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit2%2Fscript_00006.emt.xml&title=Lesson+6";
                    break;
                case 7:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit2%2Fscript_00007.emt.xml&title=Lesson+7";
                    break;
                case 8:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit2%2Fscript_00008.emt.xml&title=Lesson+8";
                    break;
            }
        } else if ($unit == 3) {
            switch ($subUnit) {
                case 1:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit3%2Fscript_00001.emt.xml&title=Lesson+1";
                    break;
                case 2:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit3%2Fscript_00002.emt.xml&title=Lesson+2";
                    break;
                case 3:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit3%2Fscript_00003.emt.xml&title=Lesson+3";
                    break;
                case 4:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit3%2Fscript_00004.emt.xml&title=Lesson+4";
                    break;
                case 5:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit3%2Fscript_00005.emt.xml&title=Lesson+5";
                    break;
                case 6:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit3%2Fscript_00006.emt.xml&title=Lesson+6";
                    break;
                case 7:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit3%2Fscript_00007.emt.xml&title=Lesson+7";
                    break;
                case 8:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit3%2Fscript_00008.emt.xml&title=Lesson+8";
                    break;
            }
        } else if ($unit == 4) {
            switch ($subUnit) {
                case 1:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit4%2Fscript_00001.emt.xml&title=Lesson+1";
                    break;
                case 2:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit4%2Fscript_00002.emt.xml&title=Lesson+2";
                    break;
                case 3:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit4%2Fscript_00003.emt.xml&title=Lesson+3";
                    break;
                case 4:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit4%2Fscript_00004.emt.xml&title=Lesson+4";
                    break;
                case 5:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit4%2Fscript_00005.emt.xml&title=Lesson+5";
                    break;
                case 6:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit4%2Fscript_00006.emt.xml&title=Lesson+6";
                    break;
                case 7:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit4%2Fscript_00007.emt.xml&title=Lesson+7";
                    break;
                case 8:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit4%2Fscript_00008.emt.xml&title=Lesson+8";
                    break;
            }
        } else if ($unit == 5) {
            switch ($subUnit) {
                case 1:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit5%2Fscript_00001.emt.xml&title=Lesson+1";
                    break;
                case 2:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit5%2Fscript_00002.emt.xml&title=Lesson+2";
                    break;
                case 3:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit5%2Fscript_00003.emt.xml&title=Lesson+3";
                    break;
                case 4:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit5%2Fscript_00004.emt.xml&title=Lesson+4";
                    break;
                case 5:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit5%2Fscript_00005.emt.xml&title=Lesson+5";
                    break;
                case 6:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit5%2Fscript_00006.emt.xml&title=Lesson+6";
                    break;
                case 7:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit5%2Fscript_00007.emt.xml&title=Lesson+7";
                    break;
                case 8:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit5%2Fscript_00008.emt.xml&title=Lesson+8";
                    break;
            }
        } else if ($unit == 6) {
            switch ($subUnit) {
                case 1:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit6%2Fscript_00001.emt.xml&title=Lesson+1";
                    break;
                case 2:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit6%2Fscript_00002.emt.xml&title=Lesson+2";
                    break;
                case 3:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit6%2Fscript_00003.emt.xml&title=Lesson+3";
                    break;
                case 4:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit6%2Fscript_00004.emt.xml&title=Lesson+4";
                    break;
                case 5:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit6%2Fscript_00005.emt.xml&title=Lesson+5";
                    break;
                case 6:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit6%2Fscript_00006.emt.xml&title=Lesson+6";
                    break;
                case 7:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit6%2Fscript_00007.emt.xml&title=Lesson+7";
                    break;
                case 8:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit6%2Fscript_00008.emt.xml&title=Lesson+8";
                    break;
            }
        } else {
            switch ($subUnit) {
                case 1:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit7%2Fscript_00001.emt.xml&title=Lesson+1";
                    break;
                case 2:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit7%2Fscript_00002.emt.xml&title=Lesson+2";
                    break;
                case 3:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit7%2Fscript_00003.emt.xml&title=Lesson+3";
                    break;
                case 4:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit7%2Fscript_00004.emt.xml&title=Lesson+4";
                    break;
                case 5:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit7%2Fscript_00005.emt.xml&title=Lesson+5";
                    break;
                case 6:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit7%2Fscript_00006.emt.xml&title=Lesson+6";
                    break;
                case 7:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit7%2Fscript_00007.emt.xml&title=Lesson+7";
                    break;
                case 8:
                    $game = "http://localhost/EPB_level1_scorm12/scorm-emt.html?sco=content%2Flearningunit7%2Fscript_00008.emt.xml&title=Lesson+8";
                    break;
            }
        }

        $data = [
            'unit' => $unit,
            'subUnit' => $subUnit,
            'game' => $game
        ];

        session()->put('activeMenu',  'games');

        return view('englishPlayboxGames')->with($data);
    }

    public function streamVideo($v)
    {
        $video_path = public_path() . "/videos/" . $v;
        $stream = new VideoStream($video_path);
        $stream->start();
    }
}
