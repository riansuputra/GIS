<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelinggih extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function pura() {
        return $this->belongsTo('App\Models\Pura');
    }
}
