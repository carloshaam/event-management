<?php

declare(strict_types=1);

namespace App\Actions\Location;

use App\Contracts\Location\LocationRepositoryInterface;
use App\DataTransferObjects\Location\CreateLocationDTO;
use App\Http\Resources\Location\LocationResource;

final readonly class CreateLocationAction
{
    public function __construct(
        private LocationRepositoryInterface $repository,
    ) {}

    public function execute(CreateLocationDTO $data): LocationResource
    {
        return $this->repository->create($data);
    }
}
