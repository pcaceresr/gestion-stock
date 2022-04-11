<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';

    public function categoria()
    {
        return $this->belongsTo(categoria::class);
    }

    public function producto()
    {
        return $this->belongsToMany(productoSucursal::class);
    }
        
    use HasFactory;

}
