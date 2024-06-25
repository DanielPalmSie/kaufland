<?php

use PHPUnit\Framework\TestCase;
use App\Infrastructure\XML\XMLReader;
use App\Domain\Entities\Product;

class XMLReaderTest extends TestCase
{
    public function testReadValidFile()
    {
        $xmlReader = new XMLReader();
        $products = $xmlReader->read(__DIR__ . '/fixtures/feed.xml');

        $this->assertIsArray($products);
        $this->assertInstanceOf(Product::class, $products[0]);
    }

    public function testReadInvalidFile()
    {
        $xmlReader = new XMLReader();
        $products = $xmlReader->read(__DIR__ . '/fixtures/invalid.xml');

        $this->assertIsArray($products);
        $this->assertEmpty($products);
    }

    public function testReadNonExistentFile()
    {
        $xmlReader = new XMLReader();
        $products = $xmlReader->read(__DIR__ . '/fixtures/nonexistent.xml');

        $this->assertIsArray($products);
        $this->assertEmpty($products);
    }
}
