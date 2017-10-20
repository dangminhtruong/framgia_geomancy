<?php

namespace App\Framgia\Response;

class FlashResponse
{
    public function success($route_name, $message)
    {
        return redirect()->route($route_name)
            ->with('success_msg', $message);
    }

    public function fail($route_name, $message)
    {
        return redirect()->route($route_name)
            ->with('error_msg', $message);
    }
    public function unauthorize($route_name, $message)
    {
        return redirect()->route($route_name)
            ->with('error_msg', $message);
    }

    public function successAndBack($message)
    {
        return redirect()->back()
            ->with('success_msg', $message);
    }

    public function failAndBack($message)
    {
        return redirect()->back()
            ->with('error_msg', $message);
    }
}
