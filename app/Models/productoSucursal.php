<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productoSucursal extends Model
{
    protected $table = 'productos_sucursal';
    protected $primaryKey = ['producto_id', 'sucursal_id'];
    public $incrementing = false;

    public function producto()
    {
        return $this->belongsTo(producto::class, 'producto_id');
    }

    public function sucursal()
    {
        return $this->belongsTo(sucursal::class, 'sucursal_id')->withDefault();
    }

    use HasFactory;

}
