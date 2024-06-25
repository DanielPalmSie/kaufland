<?php

declare(strict_types=1);

namespace App\Domain\Entities;

class Product
{
    private int $entityId;
    private string $categoryName;
    private string $sku;
    private string $name;
    private string $description;
    private string $shortdesc;
    private float $price;
    private string $link;
    private string $image;
    private string $brand;
    private int $rating;
    private string $caffeineType;
    private int $count;
    private bool $flavored;
    private bool $seasonal;
    private bool $instock;
    private int $facebook;
    private bool $isKCup;

    public function getEntityId(): int
    {
        return $this->entityId;
    }

    public function setEntityId(int $entityId): void
    {
        $this->entityId = $entityId;
    }

    public function getCategoryName(): string
    {
        return $this->categoryName;
    }

    public function setCategoryName(string $categoryName): void
    {
        $this->categoryName = $categoryName;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getShortdesc(): string
    {
        return $this->shortdesc;
    }

    public function setShortdesc(string $shortdesc): void
    {
        $this->shortdesc = $shortdesc;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }

    public function getCaffeineType(): string
    {
        return $this->caffeineType;
    }

    public function setCaffeineType(string $caffeineType): void
    {
        $this->caffeineType = $caffeineType;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    public function isFlavored(): bool
    {
        return $this->flavored;
    }

    public function setFlavored(bool $flavored): void
    {
        $this->flavored = $flavored;
    }

    public function isSeasonal(): bool
    {
        return $this->seasonal;
    }

    public function setSeasonal(bool $seasonal): void
    {
        $this->seasonal = $seasonal;
    }

    public function isInstock(): bool
    {
        return $this->instock;
    }

    public function setInstock(bool $instock): void
    {
        $this->instock = $instock;
    }

    public function getFacebook(): int
    {
        return $this->facebook;
    }

    public function setFacebook(int $facebook): void
    {
        $this->facebook = $facebook;
    }

    public function isKCup(): bool
    {
        return $this->isKCup;
    }

    public function setIsKCup(bool $isKCup): void
    {
        $this->isKCup = $isKCup;
    }
}