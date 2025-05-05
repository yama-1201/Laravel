<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $guarded = 
    [
        'id',
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
