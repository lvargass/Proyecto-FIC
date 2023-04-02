<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CombinationTable extends Model
{
    use HasFactory;
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'rubro_id', 'comuna_id', 'list_documents'
    ]; 
  
    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function list_documents(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    } 
}
