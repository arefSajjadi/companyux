<?php

namespace App\DB;

use App\Models\Comment;
use App\Models\Job;

class CommentRepo
{
    public function getComment($user)
    {
        return $user->comments()->paginate(10);
    }

    public function getJobs()
    {
        return Job::query()->orderBy('title')->get();
    }


    public function storeComment($user, $request, $company)
    {
        $user->comments()->create([ //db
            'job_id' => $request->job_id,
            'company_id' => $company->id,
            'display_name' => $request->display_name,
            'comment' => $request->comment,
            'status' => Comment::STATUS_WAITING,
            'type' => $request->type,
            'hire' => (bool)$request->hire,
            'requested_wage' => intval(preg_replace('/\D/', '', $request->requested_wage)),
            'received_wage' => intval(preg_replace('/\D/', '', $request->received_wage))
        ]);
    }

    public function updateComment($request, $comment)
    {
        $comment->update([ 
            'job_id' => $request->job_id,
            'display_name' => $request->display_name,
            'comment' => $request->comment,
            'status' => Comment::STATUS_WAITING,
            'type' => $request->type,
            'hire' => (bool)$request->hire,
            'requested_wage' => intval(preg_replace('/\D/', '', $request->requested_wage)),
            'received_wage' => intval(preg_replace('/\D/', '', $request->received_wage))
        ]);
    }


    public function delete($comment)
    {
        $comment->delete();
    }


    
}