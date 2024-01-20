<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Post;
use App\Models\User;
use Database\Factories\RelationPostsCategoriasFactory;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_post_show()
    {
        $post = RelationPostsCategoriasFactory::new()->create();

        $response = $this->getJson("/api/post/{$post->id}");

        $response->assertStatus(200)
            ->assertJson([
                [
                    'id' => $post->id,
                    'title' => $post->title,
                    'imagem_grande' => $post->imagem_grande,
                    'alt_imagem_grande' => $post->alt_imagem_grande,
                    'imagem_media' => $post->imagem_media,
                    'alt_imagem_media' => $post->alt_imagem_media,
                    'imagem_pequena' => $post->imagem_pequena,
                    'alt_imagem_pequena' => $post->alt_imagem_pequena,
                    'conteudo' => $post->conteudo,
                    'data_publicacao' => $post->data_publicacao,
                    'slug' => $post->slug,
                    'categoria_id' => $post->categoria_id,
                    'user_id' => $post->user_id,
                ]
            ]);

    }

    public function test_posts_index()
    {
    RelationPostsCategoriasFactory::new()->count(5)->create();

    $response = $this->getJson('/api/post');

    $response->assertStatus(200)
        ->assertJsonStructure([
            'last_page',
            'current_page',
            'data' => [
                '*' => [
                    'id', 'title', 'imagem_grande', 'alt_imagem_grande',
                    'imagem_media', 'alt_imagem_media', 'imagem_pequena',
                    'alt_imagem_pequena', 'conteudo', 'data_publicacao', 'slug', 'categoria_id'
                ]
            ],
            'from',
            'per_page',
            'to',
            'total',
        ]);
    }

    /**
     * Teste requisição API de posts com relacionamento com usuário e categoria
     */

    public function test_get_index_post_com_user(){
        $categoria = Categoria::factory()->create();
        $user = User::factory()->create();
        Post::factory()->create([
            'user_id' => $user->id,
            'categoria_id' => $categoria->id,
        ]);

        $response = $this->getJson('/api/post-com-categoria-e-user');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'last_page',
                'current_page',
                'data' => [
                    '*' => [
                        'id',
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
                ],
                'from',
                'per_page',
                'to',
                'total',
            ]);
    }
}
