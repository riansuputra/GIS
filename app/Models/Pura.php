<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pura extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function pelinggih() {
        return $this->hasMany('App\Models\Pelinggih');
    }

    public function pengurus() {
        return $this->hasMany('App\Models\Pengurus');
    }
}
