<?php

use PHPUnit\Framework\TestCase;
use App\Application\Services\ProductService;
use App\Domain\Repositories\ProductRepositoryInterface;
use App\Infrastructure\XML\XMLReader;
use Psr\Log\LoggerInterface;
use App\Domain\Entities\Product;

class ProductServiceTest extends TestCase
{
    public function testImportProducts()
    {
        $productRepository = $this->createMock(ProductRepositoryInterface::class);
        $xmlReader = $this->createMock(XMLReader::class);
        $logger = $this->createMock(LoggerInterface::class);

        $product = new Product();

        $xmlReader->method('read')->willReturn([$product]);
        $productRepository->expects($this->once())->method('save')->with($product);
        $logger->expects($this->once())->method('info')->with('Products imported successfully.');

        $productService = new ProductService($productRepository, $xmlReader, $logger);
        $productService->importProducts(__DIR__ . '/fixtures/feed.xml');
    }

    public function testImportProductsWithNoProducts()
    {
        $productRepository = $this->createMock(ProductRepositoryInterface::class);
        $xmlReader = $this->createMock(XMLReader::class);
        $logger = $this->createMock(LoggerInterface::class);

        $xmlReader->method('read')->willReturn([]);
        $productRepository->expects($this->never())->method('save');
        $logger->expects($this->once())->method('warning')->with('No products found in the XML file.');

        $productService = new ProductService($productRepository, $xmlReader, $logger);
        $productService->importProducts(__DIR__ . '/fixtures/feed.xml');
    }
}
