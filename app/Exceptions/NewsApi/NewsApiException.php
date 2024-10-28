<?php

declare(strict_types=1);

namespace App\Exceptions\NewsApi;

use Exception;
use Illuminate\Http\JsonResponse;

class NewsApiException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json(['error' => $this->getMessage()], 500);
    }
}
