<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $guarded = 
    [
        'id',
    ];
    
    public function stores()
    {
        return $this->hasMany('App\Models\Store');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function reports()
    {
        return $this->hasMany('App\Models\Report');
    }
}
