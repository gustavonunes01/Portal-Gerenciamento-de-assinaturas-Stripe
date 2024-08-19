<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class BusinessException extends HttpException
{
    public static function error(string $message, $status = 400): self
    {
        $exception = new static($status, $message, null, []);
        return $exception;
    }
}
