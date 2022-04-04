<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Models\Job;
use App\Repositories\Interfaces\RepositoryInterface;

class CommentRepository implements RepositoryInterface
{
    public function getUsersProprety($user)
    {
        return $user->comments()->paginate(10);
    }

    public function getJobs()
    {
        return Job::query()->orderBy('title')->get();
    }


    public function store($data ,$user, $company =null)
    {
        $user->comments()->create($data);
    }

    public function updateComment(array $data, $comment)
    {
        $comment->update($data);
    }


    public function delete($comment)
    {
        $comment->delete();
    }


    
}