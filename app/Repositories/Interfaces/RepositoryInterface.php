<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface
{
    public function getUsersProprety($user);
    public function store(array $data, $user, $relate = null);
    public function delete($company);
}
