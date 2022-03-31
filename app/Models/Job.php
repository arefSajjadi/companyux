<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


    public function comments()
    {
        return $this->hasMany(Commnet::class, 'job_id');
    }
}
