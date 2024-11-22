<?php

declare(strict_types=1);

namespace App\Http\Middleware\Event;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PubliclyAccessible
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        abort_if($request->route('event')->isPrivateAndNotPublished(), Response::HTTP_NOT_FOUND);

        return $next($request);
    }
}
