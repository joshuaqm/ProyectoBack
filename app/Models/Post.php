<?php

namespace App\Models;

use App\Models\Comentario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'category',
        'author_name',
        'comments',
    ];

    public function comentario()
    {
        return $this->hasMany(Comentario::class, 'post_id');
    }
}
