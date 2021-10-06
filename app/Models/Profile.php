<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $primaryKey = 'profileID';

    protected $fillable = [
        'firstName',
        'lastName',
        'gender',
        'age',
        'email',
        'password',
        'phoneNumber',
        'is_admin',
        'image'
    ];
}
