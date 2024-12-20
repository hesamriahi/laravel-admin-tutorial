<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','status','slug','summary','body','meta_title','meta_description','image'];

    const STATUS_DRAFT = 'draft';
    const STATUS_PENDING = 'pending';
    const STATUS_PUBLISHED = 'published';
    const STATUS_UNPUBLISHED = 'unpublished';

    public static function getAvailableStatuses():array
    {
        return [
            static::STATUS_DRAFT,
            static::STATUS_PENDING,
            static::STATUS_PUBLISHED,
            static::STATUS_UNPUBLISHED
        ];
    }

    public function post_category(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(PostCategory::class,'post_category_id');
    }
}
