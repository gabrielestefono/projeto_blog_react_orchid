<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
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
        ];
    }
}
