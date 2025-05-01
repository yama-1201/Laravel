<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
