<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';

    public function producto()
    {
        return $this->belongsTo('App\Models\categoria', 'categoria_id');
    }
        
    use HasFactory;

}
