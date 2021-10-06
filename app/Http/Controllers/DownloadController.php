<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Support\Facades\Storage;


class DownloadController extends Controller
{
    //
    public function downloadFile($fileParam)
    {
        $file = Files::find($fileParam);

        $downloadFile = public_path() . '/files/' . $file->file;

        return response()->download($downloadFile);
    }
}
