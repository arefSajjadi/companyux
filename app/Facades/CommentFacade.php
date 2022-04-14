<?php

namespace App\Facades;

use App\Models\Comment;
use App\Models\Company;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Comment store(User|Authenticatable $user, Company $company, array $data)
 * @method static bool update(Comment $comment, array $data)
 * @method static void delete(Comment $comment)
 */
class CommentFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'comment';
    }
}
