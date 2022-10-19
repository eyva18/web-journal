<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editors extends Model
{
    use HasFactory;
    protected $table = 'editorialboard';

    protected $fillable = [
        'name', 'affiliation', 'image', 'from'
    ];

}
