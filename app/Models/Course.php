<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
