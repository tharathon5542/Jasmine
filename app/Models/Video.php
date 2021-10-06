<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $primaryKey = 'videoID';

    protected $fillable = [
        'videoName',
        'videoDescription',
        'videoFile',
        'image',
        'categoryID'
    ];
}
