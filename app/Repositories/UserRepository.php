<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    private ?User $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function comments(int $paginate = 10): LengthAwarePaginator
    {
        return  $this->user->comments()->orderByDesc('created_at')->paginate($paginate);
    }

    public function companies(int $paginate = 10): LengthAwarePaginator
    {
        return  $this->user->companies()->orderByDesc('created_at')->paginate($paginate);
    }
}
