<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Onda extends Pivot
{
    use HasFactory;

    public $incrementing = true;

    protected $table = 'ondas';
    protected $fillable = ['Bateria', 'Surfista'];

    public $timestamps = false;

    public function notas() : HasMany
    {
        return $this->hasMany(Nota::class, 'Onda', 'id');
    }

    public function baterias() : BelongsTo
    {
        return $this->belongsTo(Bateria::class, 'Bateria');
    }

}
