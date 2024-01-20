<?php

namespace Tests\Feature;

use App\Models\Categoria;
use Tests\TestCase;

class CategoriaTest extends TestCase
{
    /**
     * Teste de requisição de várias Categorias
     */

     public function test_categorias_index(){
        Categoria::factory()->count(5)->create();

        $response = $this->getJson('/api/categoria');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'nome',
                    'slug'
                ]
            ]);
     }

     /**
      * Teste de requisição de uma só categoria
      */

     public function test_categorias_show(){
        $categoria = Categoria::factory()->create();

        $response = $this->getJson("/api/categoria/{$categoria->id}");

        $response->assertStatus(200)
            ->assertJson([
                "id"=> $categoria->id,
                "nome"=> $categoria->nome,
                "slug" => $categoria->slug,
            ]);
     }
}
