<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $primaryKey = 'fileID';

    protected $fillable = [
        'fileName',
        'file',
        'videoID'
    ];
}
