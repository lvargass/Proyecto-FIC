<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processes extends Model
{
    use HasFactory;

    /**
     * Get the rubro associated with the process.
     */
    public function getRubro()
    {
        return $this->belongsTo(Rubros::class , 'rubro_id', 'id')->first();
    }
    /**
     * Get the comuna associated with the process.
     */
    public function getComuna()
    {
        return $this->belongsTo(Comunas::class , 'comuna_id', 'id')->first();
    }
}
