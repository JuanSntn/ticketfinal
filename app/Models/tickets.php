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
        'descripcion',
        'estatus',
        'cargo',
        'id_departamentos',


    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
