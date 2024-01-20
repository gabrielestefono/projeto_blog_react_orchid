<?php

namespace Tests\Unit;

use App\Models\Categoria;
use PHPUnit\Framework\TestCase;

class CategoriaTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testeDeCriacaoDeUmaNovaCategoria(): void
    {
        $categoriaNova = [
            "nome" => "Categoria Teste",
            "slug"=> "categoria_teste",
        ];

        $categoria = new Categoria($categoriaNova);

        $this->assertEquals($categoriaNova['nome'], $categoria->nome);
        $this->assertEquals($categoriaNova['slug'], $categoria->slug);
    }
}
