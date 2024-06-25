<?php

declare(strict_types=1);

namespace App\Presentation\CLI;

use App\Application\Services\ProductService;
use Psr\Log\LoggerInterface;

readonly class ImportProductsCommand
{
    public function __construct(
        private ProductService  $productService,
        private LoggerInterface $logger
    ) {}

    public function execute(): void
    {
        $filePath = 'feed.xml';

        if (!file_exists($filePath)) {
            $this->logger->error('File not found: ' . $filePath);
            return;
        }

        $this->productService->importProducts($filePath);
    }
}