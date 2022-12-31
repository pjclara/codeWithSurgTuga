<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function diagnosticos()
    {
        return $this->morphedByMany(Diagnostico::class, 'taggable');
    }

    public function procedimentos()
    {
        return $this->morphedByMany(Procedimento::class, 'taggable');
    }
}
