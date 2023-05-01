<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = Str::slug($title);
        $body = $this->faker->paragraph(3,true);
        $publishedAtDate = $this->faker->dateTime;
        $summary = Str::limit(strip_tags($body), 100);

        return [
            'user_id' => 31,//User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' => $title,
            'slug' => $slug,
            'body' =>$body,
            'summary' =>$summary,
            'published_at' => $publishedAtDate
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $post->tags()->attach(Tag::inRandomOrder()->limit(3)->get());
        });
    }
}
