<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    
    public function store()
    {
        return $this->hasMany(Store::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function reports()
{
    return $this->hasMany(Report::class);
}
}
