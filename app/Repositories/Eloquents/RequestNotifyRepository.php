<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RequestNotifyInterface;
use App\Entities\RequestNotification;

class RequestNotifyRepository extends AbstractRepository implements RequestNotifyInterface
{
    public function model()
    {
        return new RequestNotification;
    }
}
