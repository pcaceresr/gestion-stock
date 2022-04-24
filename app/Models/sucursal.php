<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sucursal extends Model
{
    protected $table= 'sucursales';
    protected$primaryKey = 'id';

    public function productoSucursales(){
        return $this->hasMany(productoSucursal::class);
}
}