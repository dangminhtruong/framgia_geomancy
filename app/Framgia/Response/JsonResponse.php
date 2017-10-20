<?php

namespace App\Framgia\Response;

class JsonResponse
{
    private $status_code;

    private function getStatusCode()
    {
        return $this->status_code;
    }

    private function setStatusCode($status_code)
    {
        $this->status_code = $status_code;
        return $this;
    }

    public function withMessage($message, $data = [])
    {
        return response()->json([
            'code' => $this->getStatusCode(),
            'message' => $message,
            'data' => $data
        ]);
    }

    public function success($message, $data = [])
    {
        return $this->setStatusCode(200)
            ->withMessage($message, $data);
    }

    public function resourceNotFound($message, $data = [])
    {
        return $this->setStatusCode(404)
            ->withMessage($message, $data);
    }

    public function invliadArgument($message, $data = [])
    {
        return $this->setStatusCode(422)
            ->withMessage($message, $data);
    }

    public function queryError($message, $data = [])
    {
        return $this->setStatusCode(500)
            ->withMessage($message, $data);
    }

    public function fail($message, $data = [])
    {
        return $this->setStatusCode(501)
            ->withMessage($message, $data);
    }
}
