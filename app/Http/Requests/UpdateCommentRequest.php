<?php

namespace App\Http\Requests;

use App\Models\Comment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property mixed job_id
 * @property mixed display_name
 * @property mixed comment
 * @property mixed type
 * @property mixed hire
 * @property mixed requested_wage
 * @property mixed received_wage
 * Class UpdateCommentRequest
 * @package App\Http\Requests
 */
class UpdateCommentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'job_id' => 'required|int',
            'display_name' => 'required|string',
            'comment' => 'required|string',
            'type' => 'required|string|' . Rule::in([Comment::type_employ, Comment::type_interviewee, Comment::type_other]),
            'hire' => 'nullable',
            'requested_wage' => 'required|string',
            'received_wage' => 'required|string',
        ];
    }
}
