<?php

declare(strict_types=1);

namespace App\Application\Interfaces;

interface XMLReaderInterface
{
    public function read(string $filePath): array;
    public function isValidItem(\SimpleXMLElement $item): bool;
}