<?php

declare(strict_types=1);

namespace App\Application\Services;

use Psr\Log\LoggerInterface;
use App\Infrastructure\XML\XMLReader;
use App\Domain\Repositories\ProductRepositoryInterface;

readonly class ProductService
{
    public function __construct
    (
        private ProductRepositoryInterface $productRepository,
        private XMLReader                  $xmlReader,
        private LoggerInterface            $logger
    ) {}

    public function importProducts(string $filePath): void
    {
        try {
            $products = $this->xmlReader->read($filePath);

            if (empty($products)) {
                $this->logger->warning('No products found in the XML file.');
                return;
            }

            foreach ($products as $product) {
                $this->productRepository->save($product);
            }

            $this->logger->info('Products imported successfully.');
        } catch (\Exception $e) {
            $this->logger->error('Error importing products: ' . $e->getMessage());
        }
    }
}