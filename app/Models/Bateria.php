<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bateria extends Model
{
    use HasFactory;

    protected $fillable = ['Surfista1', 'Surfista2'];

    public $timestamps = false;

    public function surfistas()
    {
        return $this->belongsToMany(Surfista::class, 'ondas', 'Bateria', 'Surfista', 'id', 'número');
    }

    public function ondas(): HasMany
    {
        return $this->hasMany(Onda::class, 'Bateria');
    }

    public function notas()
    {
        return $this->hasManyThrough(Nota::class, Onda::class, 'Bateria', 'Onda', 'id', 'id');
    }

}
