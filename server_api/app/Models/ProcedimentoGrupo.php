<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcedimentoGrupo extends Model
{
    use HasFactory;

    public function subcategory($columnId = 1)
    {
        return $this->hasMany(\App\Models\ProcedimentoGrupo::class, '2_digito', $columnId . '_digito')->distinct();
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\Category::class, 'parent_id');
    }
}
