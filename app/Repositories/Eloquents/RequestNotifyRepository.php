<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RequestNotifyRepositoryInterface;
use App\Entities\RequestNotification;

class RequestNotifyRepository extends AbstractRepository implements RequestNotifyRepositoryInterface
{
    public function model()
    {
        return new RequestNotification;
    }

    public function findByRequestId($requestId)
    {
        return $this->model()
            ->with(['requestNotifies'])
            ->where('request_id', $requestId)
            ->first();
    }

    public function sendSuccessNotify($requestId, $adminId)
    {
        return $this->model()
            ->create([
                'users_id' => $adminId,
                'request_id' => $requestId,
                'message' => __('Yêu cầu của bạn đã được phê duyệt'),
                'view_flg' => 0,
            ]);
    }

    public function sendUnapproveNotify($requestId, $adminId, $message)
    {
        return $this->model()
            ->create([
                'users_id' => $adminId,
                'request_id' => $requestId,
                'message' => $message,
                'view_flg' => 0,
            ]);
    }

    public function updateMessageStatus($messageId)
    {
        $messages = $this->model()->find($messageId);
        if (!$messages->view_flg) {
            $messages->view_flg = 1;
            $messages->save();

            return __('Seen');
        }
        return __('Unseen');
    }
}
