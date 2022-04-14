<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CommentRepository
{
    public function store(User $user, Company $company, array $data): Model
    {
        return $user->comments()->create([
            'job_id' => $data['job_id'],
            'company_id' => $company->id,
            'display_name' => $data['display_name'],
            'comment' => $data['comment'],
            'status' => Comment::STATUS_WAITING,
            'type' => $data['type'],
            'hire' => $data['hire'],
            'requested_wage' => $data['requested_wage'],
            'received_wage' => $data['received_wage']
        ]);
    }

    public function update(Comment $comment, array $data): bool
    {
        return $comment->update([
            'job_id' => $data['job_id'],
            'display_name' => $data['display_name'],
            'comment' => $data['comment'],
            'status' => $data['status'],
            'type' => $data['type'],
            'hire' => $data['hire'],
            'requested_wage' => $data['requested_wage'],
            'received_wage' => $data['received_wage']
        ]);
    }

    public function delete(Comment $comment): void
    {
        $comment->delete();
    }
}
