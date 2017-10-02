<?php

namespace App\Framgia\Response;

class FormResponse
{
     public function response($request, $message)
     {
        return back()->withInput($request->all())
            ->withErrors([
                'form_error' => $message
        ]);
     }
}
