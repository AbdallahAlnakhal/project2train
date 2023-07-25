<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'full_text', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define the relationship with the Tag model
    public function tags()
    {
        return $this->belongsToMany(tags::class, 'article_tag', 'article_id', 'tag_id');

    }
}
