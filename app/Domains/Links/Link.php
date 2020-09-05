<?php
declare(strict_types = 1);

namespace App\Domains\Links;

use App\Domains\Common\Identifier;
use DateTime;
use Exception;

class Link
{
    private Identifier $id;

    private Identifier $userId;

    private int $sortOrder;

    private string $title;

    private string $url;

    private string $description;

    private DateTime $dateCreate;

    private array $tags = [];

    /**
     * Link constructor.
     * @param Identifier $id
     * @param Identifier $userId
     * @param string $url
     * @throws Exception
     */
    public function __construct(Identifier $id, Identifier $userId, string $url)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->url = $url;
        $this->dateCreate = new DateTime();
        $this->sortOrder = 0;
    }

    public function setSortOrder(int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function changeUrl(string $newUrl): self
    {
        $this->url = $newUrl;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Identifier
     */
    public function getId(): Identifier
    {
        return $this->id;
    }

    /**
     * @return Identifier
     */
    public function getUserId(): Identifier
    {
        return $this->userId;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return DateTime
     */
    public function getDateCreate(): DateTime
    {
        return $this->dateCreate;
    }

    public function addTag(Tag $tag): self
    {
        $this->tags[$tag->getText()] = $tag;
        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        unset($this->tags[$tag->getText()]);
        return $this;
    }
}
