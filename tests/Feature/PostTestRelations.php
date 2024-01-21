<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Post;
use App\Models\User;
use Tests\TestCase;

class PostTestRelations extends TestCase
{
    /**
     * Teste requisição API de posts com relacionamento com usuário.
     */
    public function test_get_index_post_com_user(){
        $categoria = Categoria::factory()->create();
        $user = User::factory()->create();
        Post::factory()->create([
            'user_id' => $user->id,
            'categoria_id' => $categoria->id,
        ]);

        $response = $this->getJson('/api/post-com-user');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'last_page',
                'current_page',
                'data' => [
                    '*' => [
                        'id',
                        'titulo',
                        'imagem_grande',
                        'alt_imagem_grande',
                        'imagem_media',
                        'alt_imagem_media',
                        'imagem_pequena',
                        'alt_imagem_pequena',
                        'conteudo',
                        'data_publicacao',
                        'slug',
                        'created_at',
                        'updated_at',
                        'categoria_id',
                        'user_id',
                        'categoria' => [
                            'id',
                            'nome',
                            'slug',
                            'created_at',
                            'updated_at',
                            ],
                        'user' => [
                            'id',
                            'name',
                            'imagem_pequena',
                            'alt_imagem_pequena',
                            'imagem_grande',
                            'alt_imagem_grande',
                            'biografia',
                            'facebook',
                            'twitter',
                            'instagram',
                            'youtube',
                            'profissao',
                            'created_at',
                            'updated_at',
                        ],
                    ],
                'from',
                'per_page',
                'to',
                'total',
                ],
            ]);
    }
}
