<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productoSucursal extends Model
{
  
    public function producto()
    {
        return $this->belongsToMany(productoSucursal::class);
    }
 

    use HasFactory;
}
