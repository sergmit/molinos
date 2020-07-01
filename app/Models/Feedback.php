<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed name
 * @property mixed question
 * @property mixed email
 * @method static find($feedbackId)
 * @method static findOrFail($feedbackId)
 */
class Feedback extends Model
{
    protected $table = 'feedback';
    protected $fillable = ['question', 'name', 'email' ];

    /**
     * @return HasMany
     */
    public function files(): HasMany
    {
        return $this->hasMany(File::class, 'feedback_id');
    }
}
