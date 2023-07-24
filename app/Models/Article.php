<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'img', 'slug'];

    public function comments() : HasMany //дна статья имеет много комментариев;
    {
        return $this->hasMany(Comment::class);
    }

    public function tags() : BelongsToMany //одна статья имеет много тегов и теги имеют много статей;
    {
        return $this->belongsToMany(Tag::class);
    }

    public function state() : HasOne //одна статья имеет только одну статистику;
    {
        return $this->hasOne(State::class);
    }
}
