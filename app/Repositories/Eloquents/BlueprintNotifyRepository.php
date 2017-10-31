<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\BlueprintNotifyRepositoryInterface;
use App\Entities\BlueprintNotification;

class BlueprintNotifyRepository extends AbstractRepository implements BlueprintNotifyRepositoryInterface
{
    public function model()
    {
        return new BlueprintNotification;
    }

    public function sendSuccessNotify($blueprintId, $adminId)
    {
        return $this->model()
            ->create([
                'users_id' => $adminId,
                'blueprints_id' => $blueprintId,
                'message' => __('Thiết kế của bạn đã được phê duyệt'),
                'view_flg' => 0,
            ]);
    }

    public function sendUnapproveNotify($blueprintId, $adminId, $message)
    {
        return $this->model()
            ->create([
                'users_id' => $adminId,
                'blueprints_id' => $blueprintId,
                'message' => $message,
                'view_flg' => 0,
            ]);
    }
}
