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

        $tags = Tag::factory(10)->create()->unique();

        $articles = Article::factory(20)->create();

        $tag_ids = $tags->pluck('id'); //https://laravel.com/docs/8.x/collections#method-pluck

        $articles->each(function ($article) use ($tag_ids) {
            $article->tags()->attach($tag_ids->random(3));
            Comment::factory(3)->create([
                'article_id' => $article->id
            ]);

            State::factory(1)->create([
                'article_id' => $article->id
            ]);
        });

    }
}
