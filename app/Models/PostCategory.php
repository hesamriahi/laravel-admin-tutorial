<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable = ['name','slug','status'];

    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Post::class,'post_category_id');
    }
}
