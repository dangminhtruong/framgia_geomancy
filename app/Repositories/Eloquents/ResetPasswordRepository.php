<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ResetPasswordRepositoryInterface;
use App\Entities\ResetPassword;

class ResetPasswordRepository extends AbstractRepository implements ResetPasswordRepositoryInterface
{
    public function model()
    {
        return new ResetPassword;
    }

    public function create($data)
    {
        return $this->model()->create($data);
    }

    public function find($data)
    {
        return $this->model()->where([
            ['token', $data],
            ['token', '<>', '0'],
            ['created_at', '>=', date('Y-m-d H:i:s', strtotime('-1 day', strtotime(date('Y-m-d H:i:s'))))],
        ])->first();
    }
}
