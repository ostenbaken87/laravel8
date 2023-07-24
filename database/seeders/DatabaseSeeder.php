<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\State;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $tags = Tag::factory(10)->create(); //создаем 10 тегов

        $articles = Article::factory(20)->create(); // создаем 20 статей

        $tags_id = $tags->pluck('id'); // создаем массив тегов

        $articles->each(function ($article) use ($tags_id) {
            $article->tags()->attach($tags_id->random(3)); // с помощью цикла присваиваем по 3 тега рандомно к каждой статьи
            Comment::factory(3)->create([ // создаем 3 коммента для статьи
                'article_id' => $article->id
            ]);
            State::factory(1)->create([ //создаем статистику для статьи
                'article_id' => $article->id
            ]);
        });
    }
}
