<?php

namespace Database\Seeders;

use Database\Factories\RelationPostsCategoriasFactory;
use Illuminate\Database\Seeder;

class RelationPostsCategoriasSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RelationPostsCategoriasFactory::new()->count(5)->create();
    }
}
