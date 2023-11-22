<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nota extends Model
{

    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['Onda', 'notaParcial1', 'notaParcial2', 'notaParcial3'];

    public function ondas() : BelongsTo
    {
        return $this->belongsTo(Onda::class, 'Onda');
    }
}
