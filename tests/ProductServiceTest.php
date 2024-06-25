<?php

use PHPUnit\Framework\TestCase;
use App\Application\Services\ProductService;
use App\Domain\Repositories\ProductRepositoryInterface;
use App\Infrastructure\XML\XMLReader;
use Psr\Log\LoggerInterface;
use App\Domain\Entities\Product;

class ProductServiceTest extends TestCase
{
    private $productRepository;
    private $xmlReader;
    private $logger;

    protected function setUp(): void
    {
        $this->productRepository = $this->createMock(ProductRepositoryInterface::class);
        $this->xmlReader = $this->createMock(XMLReader::class);
        $this->logger = $this->createMock(LoggerInterface::class);
    }

    public function testImportProducts()
    {
        $product = new Product();

        $this->xmlReader->method('read')->willReturn([$product]);
        $this->productRepository->expects($this->once())->method('save')->with($product);
        $this->logger->expects($this->once())->method('info')->with('Products imported successfully.');

        $productService = new ProductService($this->productRepository, $this->xmlReader, $this->logger);
        $productService->importProducts(__DIR__ . '/fixtures/feed.xml');
    }

    public function testImportProductsWithNoProducts()
    {
        $this->xmlReader->method('read')->willReturn([]);
        $this->productRepository->expects($this->never())->method('save');
        $this->logger->expects($this->once())->method('warning')->with('No products found in the XML file.');

        $productService = new ProductService($this->productRepository, $this->xmlReader, $this->logger);
        $productService->importProducts(__DIR__ . '/fixtures/feed.xml');
    }
}
