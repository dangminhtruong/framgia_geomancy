<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Entities\User;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    public function model()
    {
        return new User;
    }

    public function create($data)
    {
        return $this->model()->create($data);
    }
}
