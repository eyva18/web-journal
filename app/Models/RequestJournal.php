<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestJournal extends Model
{
    use HasFactory;
    protected $table = 'request';
    protected $guarded = [];
}
