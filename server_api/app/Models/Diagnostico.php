<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;

    //protected $table ='cm';

    protected $fillable = ['id', 'codigo', 'descricao_curta', 'descricao_longa'];

    public function descricao()
    {
        return $this->morphOne(Descricao::class, 'descricable',);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')->select('id','nome');
    }

    public function favoritos()
    {
        return $this->morphMany(Favorito::class, 'favoritable');
    }
}
