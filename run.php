<?php

use App\Application;
use Doctrine\ORM\EntityManager;
use GuzzleHttp\Psr7\Message;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

/** @var EntityManager $entityManager */
$entityManager = require __DIR__ . '/src/bootstrap.php';

$binPackagingConfig = new \App\BinPackaging\Configuration(
    'znojil@madfoxdesign.cz',
    '0fcdf9c720fd216737fbc7adadba2738',
    'https://global-api.3dbinpacking.com',
);

/**
 * DI
 */
$clientProvider = new \App\BinPackaging\ClientProvider($binPackagingConfig);
$findBoxSizeIdEndpoint = new App\BinPackaging\Endpoint\FindBoxSize\FindBoxSizeId($clientProvider, $binPackagingConfig);

$schemaProcessor = new \Nette\Schema\Processor();
$inputValidator = new \App\Api\Controller\FindBoxSize\InputValidator($schemaProcessor);
$inputMarshaller = new \App\Api\Controller\FindBoxSize\InputMarshaller($inputValidator);
$outputMarshaller = new \App\Api\Controller\FindBoxSize\PackagingMarshaller();
$packagingSizeCalculator = new \App\Packaging\RandomPackagingSizeCalculator();
$packagingProvider = new \App\Packaging\PackagingProvider(
    $entityManager->getRepository(\App\Model\Entity\Result::class),
    $findBoxSizeIdEndpoint,
    $entityManager->getRepository(\App\Model\Entity\Packaging::class),
    $packagingSizeCalculator,
);

$findBoxSizeController = new \App\Api\Controller\FindBoxSize\FindBoxSizeController($inputMarshaller, $packagingProvider, $outputMarshaller);

$request = new Request('POST', new Uri('http://localhost/pack'), ['Content-Type' => 'application/json'], $argv[1]);

$application = new Application($findBoxSizeController);
$response = $application->run($request);

echo "<<< In:\n" . Message::toString($request) . "\n\n";
echo ">>> Out:\n" . Message::toString($response) . "\n\n";
