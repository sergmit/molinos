<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property bool|mixed path
 */
class File extends Model
{
    protected $fillable = ['url'];
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function feedback(): BelongsTo
    {
        return $this->belongsTo(Feedback::class, 'feedback_id');
    }
}
