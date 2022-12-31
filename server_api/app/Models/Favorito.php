<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $table ='favoritables';

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->user_id = 1;
        });
    }

    public function favoritables()
    {
        return $this->morphTo();
    }
}
