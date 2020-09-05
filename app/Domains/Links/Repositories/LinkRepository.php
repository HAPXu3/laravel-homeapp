<?php
declare(strict_types = 1);

namespace App\Domains\Links\Repositories;

use App\Domains\Common\Identifier;
use App\Domains\Links\Link;

interface LinkRepository
{
    public function create(Link $link): void;

    public function update(Link $link): void;

    public function remove(Link $link): void;

    public function findById(Identifier $id): Link;

    public function forUser(Identifier $userId);
}
