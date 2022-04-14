<?php

namespace App\Repositories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Collection;

class JobRepository
{
    public function jobs(): Collection
    {
        return Job::query()->orderBy('title')->get();
    }
}
