<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $someProperty;
    protected $table = 'posts';
    protected $fillable = ['title','post_content','image','likes','is_published', 'category_id']; //либо protected $guarded = []/false

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id', 'id'); //Получить категорию у поста
    }

    public function tags() //Получить все теги у поста
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}
