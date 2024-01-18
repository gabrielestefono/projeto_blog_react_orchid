<?php

namespace Tests\Feature;

use App\Models\Post;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_post_show()
    {
        $post = Post::factory()->create();

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
                ]
            ]);

    }

    public function test_posts_index()
    {
    Post::factory()->count(5)->create();

    $response = $this->getJson('/api/post');

    $response->assertStatus(200)
        ->assertJsonStructure([
            'last_page',
            'current_page',
            'data' => [
                '*' => [
                    'id', 'title', 'imagem_grande', 'alt_imagem_grande',
                    'imagem_media', 'alt_imagem_media', 'imagem_pequena',
                    'alt_imagem_pequena', 'conteudo', 'data_publicacao', 'slug'
                ]
            ],
            'from',
            'per_page',
            'to',
            'total',
        ]);
    }
}
