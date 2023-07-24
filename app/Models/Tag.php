<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['label'];

    public $timestamps = false;

    public function articles() : BelongsToMany // теги имеют много статей и статьи много тегов
    {
        return $this->belongsToMany(Article::class);
    }
}
