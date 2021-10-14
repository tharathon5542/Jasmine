<?php

namespace App\Http\Controllers;

use App\Models\Files;

class DownloadController extends Controller
{
    //
    public function downloadFile($fileParam)
    {
        $file = Files::find($fileParam);

        $downloadFile = public_path() . '/files/' . $file->file;

        $fileExtend = explode('.', $file->file);
        $Name = $file->fileName . '.' . $fileExtend[1];

        return response()->download($downloadFile, $Name);
    }
}
