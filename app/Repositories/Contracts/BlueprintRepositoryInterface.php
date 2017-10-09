<?php

namespace App\Repositories\Contracts;

interface BlueprintRepositoryInterface extends RepositoryInterface
{
    public function create($data);
}
