<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surfista extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'país'];

    public $timestamps = false;

    public function notas()
    {
        return $this->hasManyThrough(Nota::class, Onda::class, 'Surfista', 'Onda', 'número', 'id');
    }

    public function baterias()
    {
        return $this->belongsToMany(Bateria::class, 'ondas', 'Surfista', 'Bateria', 'número', 'id');
    }
}
