<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $articles = [
            [
                'title' => 'Article 1',
                'content' => 'Content 1',
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'title' => 'Article 2',
                'content' => 'Content 2',
                'category_id' => 2,
                'user_id' => 2,
            ],
            [
                'title' => 'Article 3',
                'content' => 'Content 3',
                'category_id' => 3,
                'user_id' => 3,
            ],
            [
                'title' => 'Article 4',
                'content' => 'Content 4',
                'category_id' => 4,
                'user_id' => 4,
            ],
            [
                'title' => 'Article 5',
                'content' => 'Content 5',
                'category_id' => 5,
                'user_id' => 5,
            ],
            [
                'title' => 'Article 6',
                'content' => 'Content 6',
                'category_id' => 6,
                'user_id' => 6,
            ],
            [
                'title' => 'Article 7',
                'content' => 'Content 7',
                'category_id' => 7,
                'user_id' => 7,
            ],
            [
                'title' => 'Article 8',
                'content' => 'Content 8',
                'category_id' => 8,
                'user_id' => 8,
            ],
            [
                'title' => 'Article 9',
                'content' => 'Content 9',
                'category_id' => 9,
                'user_id' => 9,
            ],
            [
                'title' => 'Article 10',
                'content' => 'Content 10',
                'category_id' => 10,
                'user_id' => 10,
            ],
        ];
    }
}
