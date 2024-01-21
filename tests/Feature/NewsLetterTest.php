<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsLetterTest extends TestCase
{
    /**
     * Exemplo de teste com retorno de sucesso
     */
    public function test_sucesso(): void
    {
        $payload = ['email' => 'exemplo@email.com'];

        $response = $this->post('/api/newsletter', $payload);

        $response->assertStatus(200)->assertJson(["message" => "Email cadastrado com sucesso!"]);
    }

    /**
     * Exemplo de teste com retorno de email repetido
     */

    public function test_email_repetido(): void
    {
        $payload = ['email' => 'exemplo@email.com'];

        $response = $this->post('/api/newsletter', $payload);

        $response->assertStatus(302);
    }
}
