<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    use HasFactory;

    protected $fillable = [
        'autor',
        'fecha',
        'clasif',
        'detalles',
        'estatus',
        'id_departamentos',
    
    ];

}
