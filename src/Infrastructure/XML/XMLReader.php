<?php

declare(strict_types=1);

namespace App\Infrastructure\XML;

use App\Domain\Entities\Product;

class XMLReader
{
    public function read(string $filePath): array
    {
        $products = [];

        if (!file_exists($filePath)) {
            return $products;
        }

        $xmlContent = file_get_contents($filePath);
        if ($xmlContent === false) {
            return $products;
        }

        $xml = simplexml_load_string($xmlContent);
        if ($xml === false) {
            return $products;
        }

        foreach ($xml->item as $item) {
            if ($this->isValidItem($item)) {
                $product = new Product();
                $product->setEntityId((int)$item->entity_id);
                $product->setCategoryName((string)$item->CategoryName);
                $product->setSku((string)$item->sku);
                $product->setName((string)$item->name);
                $product->setDescription((string)$item->description);
                $product->setShortdesc((string)$item->shortdesc);
                $product->setPrice((float)$item->price);
                $product->setLink((string)$item->link);
                $product->setImage((string)$item->image);
                $product->setBrand((string)$item->Brand);
                $product->setRating((int)$item->Rating);
                $product->setCaffeineType((string)$item->CaffeineType);
                $product->setCount((int)$item->Count);
                $product->setFlavored((bool)$item->Flavored);
                $product->setSeasonal((bool)$item->Seasonal);
                $product->setInstock((bool)$item->Instock);
                $product->setFacebook((int)$item->Facebook);
                $product->setIsKCup((bool)$item->IsKCup);

                $products[] = $product;
            }
        }

        return $products;
    }

    private function isValidItem($item): bool
    {
        return isset($item->entity_id, $item->CategoryName, $item->sku, $item->name, $item->price, $item->link, $item->image, $item->Brand);
    }
}