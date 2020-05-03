<?php
declare(strict_types=1);

namespace App\Entity;

/**
 * Class Product
 * @package App\Entity
 */
class Product
{
    private int $id;
    private string $title;
    private string $description;
    private int $searchTime = 0;

    public function __construct(int $id, string $title, string $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getSearchTime(): int
    {
        return $this->searchTime;
    }

    public function addSearchTime(): Product
    {
        $this->searchTime++;

        return $this;
    }

    public function jsonSerialize(): string
    {
        $product = [
            'id'   => $this->getId(),
            'name' => $this->getTitle(),
            'description' => $this->getDescription(),
            'searchTime' => $this->getSearchTime(),
        ];

        return (string) json_encode($product);
    }

    public function toArray(): array
    {
        return [
            'id'   => $this->getId(),
            'name' => $this->getTitle(),
            'description' => $this->getDescription(),
            'searchTime' => $this->getSearchTime(),
        ];
    }
}
