<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
            'title',
            'imagem_grande',
            'alt_imagem_grande',
            'imagem_media',
            'alt_imagem_media',
            'imagem_pequena',
            'alt_imagem_pequena',
            'conteudo',
            'data_publicacao',
            'slug',
            'categoria_id',
            'user_id',
        ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
