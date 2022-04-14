<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed id
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed user_id
 * @property mixed company_id
 * @property mixed display_name
 * @property mixed comment
 * @property mixed status
 * @property mixed type
 * @property mixed fa_type
 * @property mixed fa_status
 * @property mixed fa_hire
 * @property mixed hire
 * @property mixed requested_wage
 * @property mixed received_wage
 * @property User user
 * @property Company company
 * Class Comment
 * @package App\Models
 */
class Comment extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_WAITING = 'waiting';
    const STATUS_ACTIVE = 'active';

    const type_employ = 'employ';
    const type_interviewee = 'interviewee';
    const type_other = 'other';

    const types = [
        self::type_employ,
        self::type_interviewee,
        self::type_other
    ];

    protected $table = 'comments';

    protected $fillable = [
        'user_id',
        'company_id',
        'job_id',
        'display_name',
        'comment',
        'status',
        'type',
        'hire',
        'requested_wage',
        'received_wage'
    ];

    public function getFaTypeAttribute(): string
    {
        return commentType($this->type);
    }

    public function getFaStatusAttribute(): string
    {
        return commentStatus($this->status);
    }

    public function getFaHireAttribute(): string
    {
        return $this->hire ? 'بله' : 'خیر';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
