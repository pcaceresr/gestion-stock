<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table= 'categorias';
    protected$primaryKey = 'id';

    public function productos(){
        return $this->hasMany(producto::class);
    }

    use HasFactory;
}
