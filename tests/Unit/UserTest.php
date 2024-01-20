<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Teste de criação de um novo usuário
     */
    public function testCreationUser(): void
    {
        $userData = [
            "name" => "Test name",
            "email" => "Test email",
            "password" => Hash::make("password"),
            "imagem_pequena" => "Test imagem_pequena",
            "alt_imagem_pequena" => "Test alt_imagem_pequena",
            "imagem_grande" => "Test imagem_grande",
            "alt_imagem_grande" => "Test alt_imagem_grande",
            "biografia" => "Test biografia",
            "facebook" => "Test facebook",
            "instagram" => "Test instagram",
            "twitter" => "Test twitter",
            "youtube" => "Test youtube",
            "profissao" => "Test profissao",
        ];

        $user = new User($userData);

        $this->assertEquals($userData["name"], $user->name);
        $this->assertEquals($userData["email"], $user->email);
        $this->assertEquals($userData["password"], $user->password);
        $this->assertEquals($userData["imagem_pequena"], $user->imagem_pequena);
        $this->assertEquals($userData["alt_imagem_pequena"], $user->alt_imagem_pequena);
        $this->assertEquals($userData["imagem_grande"], $user->imagem_grande);
        $this->assertEquals($userData["alt_imagem_grande"], $user->alt_imagem_grande);
        $this->assertEquals($userData["biografia"], $user->biografia);
        $this->assertEquals($userData["facebook"], $user->facebook);
        $this->assertEquals($userData["instagram"], $user->instagram);
        $this->assertEquals($userData["twitter"], $user->twitter);
        $this->assertEquals($userData["youtube"], $user->youtube);
        $this->assertEquals($userData["profissao"], $user->profissao);
    }
}
