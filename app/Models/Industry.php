<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed title
 * Class Industry
 * @package App\Models
 */
class Industry extends Model
{
    use HasFactory;

    protected $table = 'industries';

    protected $fillable = ['title'];
}
