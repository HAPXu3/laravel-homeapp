<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Domains\Common\Identifier;
use App\Domains\Links\Link;
use App\Domains\Links\Repositories\LinkRepository as LinkRepositoryInterface;
use App\Models\Link as LinkModel;

class LinkRepository implements LinkRepositoryInterface
{
    public function forUser(Identifier $userId): array
    {
        return LinkModel::query()
            ->where('user_id', $userId)
            ->orderBy('created_at')
            ->get();
    }

    public function create(Link $link): void
    {
        // TODO: Implement create() method.
    }

    public function update(Link $link): void
    {
        // TODO: Implement update() method.
    }

    public function remove(Link $link): void
    {
        // TODO: Implement remove() method.
    }

    public function findById(Identifier $id): Link
    {
        // TODO: Implement findById() method.
    }
}
