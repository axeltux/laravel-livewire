<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    /**
     * Mutators & Castings
     */

    public function getExcerptAttribute()
    {
        return substr($this->description,0, 80 ) . '...';
    }

    /**
     * Relations
     */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Methods general
     */

    public function similar()
    {
        return $this->where('category_id', $this->category_id)->with('user')->take(2)->get();
    }
}
