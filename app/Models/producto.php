<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';

    public function categorias()
    {
        return $this->belongsTo(categoria::class, 'categoria_id');
    }

    public function productosSucursal()
    {
        return $this->hasMany(productoSucursal::class);
    }

    use HasFactory;

}
