<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\HttpResponses;
class TokenNotFoundException extends Exception
{
    use HttpResponses;
    /**
     * Report the exception.
     */
    public function report(): void
    {
        Log::error('Token not found');
    }

    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request): Response
    {
        return $this->error('Token not found', 401);
    }
}
