<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productoSucursal extends Model
{
    protected $table = 'productos_sucursal';
    protected $primaryKey = ['producto_id', 'sucursal_id'];
    public $incrementing = false;

    public function productosSucursal()
    {
        return $this->hasOne(producto::class);
    }

    
    use HasFactory;

}
