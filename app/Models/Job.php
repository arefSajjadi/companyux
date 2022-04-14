<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed id
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed title
 * Class Job
 * @package App\Models
 */
class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = ['title'];


    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'job_id');
    }
}
