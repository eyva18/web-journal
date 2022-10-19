<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;
    protected $table = 'issue';
    protected $guarded = [];
    public function article()
    {
        return $this->hasMany('App\Models\Article', 'id_issue');
    }
}
