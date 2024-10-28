<?php

declare(strict_types=1);

namespace App\Http\Controllers\App\Profile;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

final readonly class EditProfileController
{
    public function __invoke(Request $request): Response
    {
        return Inertia::render('App/Profile/EditProfile', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }
}
