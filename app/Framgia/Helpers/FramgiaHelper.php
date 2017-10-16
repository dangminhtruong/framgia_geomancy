<?php

namespace App\Framgia\Helpers;

class FramgiaHelper
{
    public static function formateAttribute(array $data)
    {
        $formatArray = [];
        foreach ($data as $key => $value)
        {
            $key = static::mb_ucfirst(mb_strtolower($key, 'utf8'));
            $value = static::mb_ucfirst(mb_strtolower($value, 'utf8'));
            $formatArray[str_replace(' ', '_', $key)] = $value;
        }

        return $formatArray;
    }

    public static function mb_ucfirst($string, $encoding = 'utf8')
    {
        $strlen = mb_strlen($string, $encoding);
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $strlen - 1, $encoding);
        return mb_strtoupper($firstChar, $encoding) . $then;
    }
}
