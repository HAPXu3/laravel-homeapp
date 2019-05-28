<?php

namespace App\Repositories;

use App\Models\Link;
use App\User;

class LinkRepository
{
    public function forUser(User $user)
    {
        return Link::query()
            ->where($user->getForeignKey(), $user->{$user->getKeyName()})
            ->orderBy('created_at')
            ->get();
    }
}
