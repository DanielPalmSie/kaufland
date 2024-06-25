<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\Entities\Product;
use App\Domain\Repositories\ProductRepositoryInterface;
use \PDO;

readonly class PostgresProductRepository implements ProductRepositoryInterface
{
    public function __construct(private PDO $pdo)
    {}

    public function save(Product $product): void
    {
        $stmt = $this->pdo->prepare('
            INSERT INTO products (entity_id, category_name, sku, name, description, shortdesc, price, link, image, brand, rating, caffeine_type, count, flavored, seasonal, instock, facebook, is_kcup)
            VALUES (:entity_id, :category_name, :sku, :name, :description, :shortdesc, :price, :link, :image, :brand, :rating, :caffeine_type, :count, :flavored, :seasonal, :instock, :facebook, :is_kcup)
        ');

        $stmt->execute([
            ':entity_id' => $product->getEntityId(),
            ':category_name' => $product->getCategoryName(),
            ':sku' => $product->getSku(),
            ':name' => $product->getName(),
            ':description' => $product->getDescription(),
            ':shortdesc' => $product->getShortdesc(),
            ':price' => $product->getPrice(),
            ':link' => $product->getLink(),
            ':image' => $product->getImage(),
            ':brand' => $product->getBrand(),
            ':rating' => $product->getRating(),
            ':caffeine_type' => $product->getCaffeineType(),
            ':count' => $product->getCount(),
            ':flavored' => $product->isFlavored(),
            ':seasonal' => $product->isSeasonal(),
            ':instock' => $product->isInstock(),
            ':facebook' => $product->getFacebook(),
            ':is_kcup' => $product->isKCup(),
        ]);
    }
}