<?php

namespace Tests\Unit;

use App\Models\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testNewPostCreation()
    {
        $postData = [
            'title' => 'Test title',
            'imagem_grande' => 'Test imagem_grande',
            'alt_imagem_grande' => 'Test alt_imagem_grande',
            'imagem_media' => 'Test imagem_media',
            'alt_imagem_media' => 'Test alt_imagem_media',
            'imagem_pequena' => 'Test imagem_pequena',
            'alt_imagem_pequena' => 'Test alt_imagem_pequena',
            'conteudo' => 'Test conteudo',
            'data_publicacao' => 'Test data_publicacao',
            'slug' => 'Test slug',
        ];

        $post = new Post($postData);

        $this->assertEquals($postData['title'], $post->title);
        $this->assertEquals($postData['imagem_grande'], $post->imagem_grande);
        $this->assertEquals($postData['alt_imagem_grande'], $post->alt_imagem_grande);
        $this->assertEquals($postData['imagem_media'], $post->imagem_media);
        $this->assertEquals($postData['alt_imagem_media'], $post->alt_imagem_media);
        $this->assertEquals($postData['imagem_pequena'], $post->imagem_pequena);
        $this->assertEquals($postData['alt_imagem_pequena'], $post->alt_imagem_pequena);
        $this->assertEquals($postData['conteudo'], $post->conteudo);
        $this->assertEquals($postData['data_publicacao'], $post->data_publicacao);
        $this->assertEquals($postData['slug'], $post->slug);
    }

    public function testPostToArray()
    {
        $post = new Post([
            'title' => 'Test title',
            'imagem_grande' => 'Test imagem_grande',
            'alt_imagem_grande' => 'Test alt_imagem_grande',
            'imagem_media' => 'Test imagem_media',
            'alt_imagem_media' => 'Test alt_imagem_media',
            'imagem_pequena' => 'Test imagem_pequena',
            'alt_imagem_pequena' => 'Test alt_imagem_pequena',
            'conteudo' => 'Test conteudo',
            'data_publicacao' => 'Test data_publicacao',
            'slug' => 'Test slug',
        ]);

        $expectedArray = [
            'title' => 'Test title',
            'imagem_grande' => 'Test imagem_grande',
            'alt_imagem_grande' => 'Test alt_imagem_grande',
            'imagem_media' => 'Test imagem_media',
            'alt_imagem_media' => 'Test alt_imagem_media',
            'imagem_pequena' => 'Test imagem_pequena',
            'alt_imagem_pequena' => 'Test alt_imagem_pequena',
            'conteudo' => 'Test conteudo',
            'data_publicacao' => 'Test data_publicacao',
            'slug' => 'Test slug',
        ];

        $result = $post->toArray();

        $this->assertEquals($expectedArray, $result);
    }

    public function testMassAssignment()
    {
        $postData = [
            'title' => 'Test title',
            'imagem_grande' => 'Test imagem_grande',
            'alt_imagem_grande' => 'Test alt_imagem_grande',
            'imagem_media' => 'Test imagem_media',
            'alt_imagem_media' => 'Test alt_imagem_media',
            'imagem_pequena' => 'Test imagem_pequena',
            'alt_imagem_pequena' => 'Test alt_imagem_pequena',
            'conteudo' => 'Test conteudo',
            'data_publicacao' => 'Test data_publicacao',
            'slug' => 'Test slug',
        ];

        $post = new Post();
        $post->fill($postData);

        foreach ($postData as $key => $value) {
            $this->assertEquals($value, $post->$key);
        }
    }

}
