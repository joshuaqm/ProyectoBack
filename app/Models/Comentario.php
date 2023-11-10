<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $table = 'comentarios';
    protected $guarded = [];


    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hijo()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
