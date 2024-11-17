<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UploadFileException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json(
            [
                'errors' => $this->getMessage(),
                'message' => 'Error uploading file cover.'
            ],
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }
}
