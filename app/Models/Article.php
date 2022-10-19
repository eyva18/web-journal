<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'article';
    protected $primarykey = 'id';  
    protected $guarded = [];
    public function issue(){  
              return $this->belongsTo('App\Models\Issue', 'id_issue');
}
}