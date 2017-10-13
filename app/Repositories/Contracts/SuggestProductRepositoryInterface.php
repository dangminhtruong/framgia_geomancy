<?php

namespace App\Repositories\Contracts;

interface SuggestProductRepositoryInterface extends RepositoryInterface
{
    public function create($data);
}
