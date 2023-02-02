<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $someProperty;
    protected $table = 'posts';
    protected $fillable = ['title','post_content','image','likes','is_published']; //либо protected $guarded = []/false
}
