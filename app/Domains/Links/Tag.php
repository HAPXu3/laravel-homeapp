<?php
declare(strict_types = 1);

namespace App\Domains\Links;

use App\Domains\Common\Identifier;

class Tag
{
    private Identifier $id;

    private string $text;

    public function __construct(Identifier $id, string $text)
    {
        $this->id = $id;
        $this->text = $text;
    }

    public function __toString()
    {
        return $this->text;
    }

    public function getId(): Identifier
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
