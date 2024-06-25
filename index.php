<?php

require 'vendor/autoload.php';

use App\Infrastructure\XML\XMLReader;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use App\Infrastructure\Persistence\PostgresProductRepository;
use App\Application\Services\ProductService;
use App\Presentation\CLI\ImportProductsCommand;

use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (!isset($_ENV['POSTGRES_DB'], $_ENV['POSTGRES_USER'], $_ENV['POSTGRES_PASSWORD'])) {
    die('Environment variables are not set correctly.');
}

$dsn = 'pgsql:host=myapp_postgres;port=5432;dbname=' . $_ENV['POSTGRES_DB'];
$pdo = new PDO($dsn, $_ENV['POSTGRES_USER'], $_ENV['POSTGRES_PASSWORD']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$logger = new Logger('import_logger');
$logger->pushHandler(new StreamHandler(__DIR__ . '/logs/app.log', Logger::DEBUG));

$productRepository = new PostgresProductRepository($pdo);
$xmlReader = new XMLReader();
$productService = new ProductService($productRepository, $xmlReader, $logger);
$importProductsCommand = new ImportProductsCommand($productService, $logger);

$importProductsCommand->execute();