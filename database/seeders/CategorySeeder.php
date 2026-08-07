<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Tecnologia',
            'Sport',
            'Cinema',
            'Musica',
            'Videogiochi',
            'Libri',
            'Viaggi',
            'Cucina',
            'Scienza',
            'Altro',
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate([
                'name' => $category,
            ]);
        }
    }
}