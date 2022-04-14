<?php

namespace App\Repositories;

use App\Models\Industry;
use Illuminate\Database\Eloquent\Collection;

class IndustryRepository
{
    public function index(): Collection
{
        return  Industry::all();
    }
}
