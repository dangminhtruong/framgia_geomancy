<?php

namespace App\Repositories\Contracts;

interface ResetPasswordRepositoryInterface extends RepositoryInterface
{
    public function create($data);
}
