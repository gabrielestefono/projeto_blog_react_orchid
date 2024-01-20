<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class RelationPostsCategoriasFactory extends Factory
{
    /**
     * Definindo a model
     */
    protected $model = Post::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'imagem_grande' => "https://via.placeholder.com/1216x600",
            'alt_imagem_grande' => $this->faker->sentence,
            'imagem_media' => "https://via.placeholder.com/1216x450",
            'alt_imagem_media' => $this->faker->sentence,
            'imagem_pequena' => "https://via.placeholder.com/360x240",
            'alt_imagem_pequena' => $this->faker->sentence,
            'conteudo' => $this->faker->paragraphs(asText: true),
            'data_publicacao' => $this->faker->date,
            'slug' => Str::slug($this->faker->sentence),
            'categoria_id' => Categoria::factory(),
            'user_id' => User::factory(),
        ];
    }
}
