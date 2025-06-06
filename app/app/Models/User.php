<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

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

    public function bookmarks()
    {
        return $this->belongsToMany(Store::class, 'bookmarks', 'user_id', 'store_id');
    }
}
