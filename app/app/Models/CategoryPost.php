<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CategoryPost extends Model
{
    use HasFactory;
    protected $table = 'category_post';

    public $timestamps = false;


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_post', 'post_id', 'category_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'category_post', 'post_id', 'category_id');
    }
}
