<?php

declare(strict_types=1);

namespace App\Http\Controllers\App\Profile;

use App\Http\Requests\Profile\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

final readonly class UpdateProfileController
{
    public function __invoke(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('app.profile.edit');
    }
}
