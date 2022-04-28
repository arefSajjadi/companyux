<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed id
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed establishment_at
 * @property mixed user_id
 * @property mixed industry_id
 * @property mixed name
 * @property mixed brand
 * @property mixed telephone
 * @property mixed url
 * @property mixed employees
 * @property mixed status
 * @property mixed fa_status
 * @property mixed logo
 * @property mixed reason
 * @property mixed comments
 * @property User activeComments
 * @property Industry industry
 * @property User user
 * Class Company
 * @package App\Models
 */
class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'establishment_at',
        'user_id',
        'industry_id',
        'name',
        'brand',
        'telephone',
        'url',
        'employees',
        'status',
        'logo',
        'reason'
    ];

    const STATUS_WAITING = 'waiting';
    const STATUS_ACTIVE = 'active';

    public function getLogoAttribute(): string
    {
        return empty($this->logo) ? asset('images/default.png') : $this->logo;
    }

    public function getFaStatusAttribute(): string
    {
        return companyStatus($this->status);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function industry(): BelongsTo
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'company_id');
    }

    public function activeComments(): HasMany
    {
        return $this->hasMany(Comment::class, 'company_id')
            ->where('status', Comment::STATUS_ACTIVE)
            ->orderByDesc('created_at');
    }
}
