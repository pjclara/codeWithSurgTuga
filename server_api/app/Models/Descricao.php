<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descricao extends Model
{
    use HasFactory;

    protected $table ='descricables';

    protected $fillable = ['descricao_personalizada'];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->user_id = 1;
        });
    }

    public function descricable()
    {
        return $this->morphTo();
    }
}
