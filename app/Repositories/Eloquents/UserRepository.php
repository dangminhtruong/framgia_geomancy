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

    public function update(array $data, array $condition)
    {
        return $this->model()->where($condition)->update($data);
    }

    public function findByEmail($email)
    {
        return $this->model()->where('email', $email)->first();
    }

    public function findById($userId)
    {
        return $this->model()
            ->where('id', $userId)
            ->first();
    }

    public function updateById($userId, $data)
    {
        return $this->model()
            ->where('id', $userId)
            ->update($data);
    }

    public function getProfileById($userId)
    {
        return $this->model()
            ->with(['requests', 'blueprints', 'posts'])
            ->where('id', $userId)
            ->first();
    }

    public function getLockAccountByPage($pageNo, $rowPerPage = 30)
    {
        return $this->model()
            ->where([
                ['status', 0],
                ['role', '<>', 1]
            ])
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->skip(($pageNo - 1) * $rowPerPage)
            ->take($rowPerPage)
            ->get();
    }

    public function countLockAccout()
    {
        return $this->model()
            ->where([
                ['status', 0],
                ['role', '<>', 1]
            ])
            ->count();
    }

    public function getActiveAccountByPage($pageNo, $rowPerPage = 30)
    {
        return $this->model()
            ->where([
                ['status', 1],
                ['role', '<>', 1]
            ])
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->skip(($pageNo - 1) * $rowPerPage)
            ->take($rowPerPage)
            ->get();
    }

    public function countActiveAccount()
    {
        return $this->model()
            ->where([
                ['status', 1],
                ['role', '<>', 1]
            ])
            ->count();
    }

    public function getUserRequestBlueprint($id)
    {
        return $this->model()->find($id)->requests;
    }

    public function lockById($userId)
    {
        return $this->model()
            ->where('id', $userId)
            ->update(['status' => 0]);
    }

    public function getUserBlueprint($id)
    {
        $blueprint = $this->model()->find($id);
        return $blueprint->blueprints;
    }

    public function unlockById($userId)
    {
        return $this->model()
            ->where('id', $userId)
            ->update(['status' => 1]);
    }

    public function searchLockAccountByEmail($email)
    {
        return $this->model()
            ->where([
                ['email', 'like', '%' . $email . '%'],
                ['role', '<>', 1],
                ['status', 0],
            ])
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function searchActiveAccountByEmail($email)
    {
        return $this->model()
            ->where([
                ['email', 'like', '%' . $email . '%'],
                ['role', '<>', 1],
                ['status', 1],
            ])
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
