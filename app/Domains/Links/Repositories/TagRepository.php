<?php
declare(strict_types = 1);

namespace App\Domains\Links\Repositories;

use App\Domains\Common\Identifier;
use App\Domains\Links\Tag;
use App\Domains\Links\Link;

interface TagRepository
{
    public function create(Tag $tag): void;

    public function remove(Tag $tag): void;

    public function findById(Identifier $id): Tag;

    public function forLink(Link $link): array;
}
