<?php

declare(strict_types=1);

namespace App\Actions\Event;

use App\Support\File;
use App\Utilities\DefineDiskHelper;
use Illuminate\Http\UploadedFile;

final readonly class CreateEventCoverAction
{
    public function execute(UploadedFile $cover): File
    {
        $name = $cover->hashName();
        $cover->storePubliclyAs('/events', $name, DefineDiskHelper::disk());

        return new File(
            name: $name,
            originalName: $cover->getClientOriginalName(),
            extension: $cover->getClientOriginalExtension(),
            mime: $cover->getClientMimeType(),
            path: $cover->path(),
            hash: $name,
            collection: 'events',
        );
    }
}
