<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Programming',
                'description' => 'Learn programming languages and development skills'
            ],
            [
                'name' => 'Design',
                'description' => 'Learn graphic design, UI/UX, and design principles'
            ],
            [
                'name' => 'Business',
                'description' => 'Learn business management, marketing, and entrepreneurship'
            ],
            [
                'name' => 'Language',
                'description' => 'Learn different languages and communication skills'
            ],
            [
                'name' => 'Music',
                'description' => 'Learn music theory, instruments, and production'
            ]
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description']
            ]);
        }
    }
}
