<?php

/**
 * Created by PhpStorm.
 * User: ksv
 * Date: 23.12.16
 * Time: 13:46
 */

use CatalogOfPhpPatterns\ServiceLayer\Helpers\ServiceFactoryHelper;
use CatalogOfPhpPatterns\ServiceLayer\Services\ConcreteService;

/**
 * Class HelperTest
 */
class HelperTest extends PHPUnit_Framework_TestCase
{
    public function test_Correct_CreateService()
    {
        /** @var ConcreteService $service */
        $service = ServiceFactoryHelper::create(ConcreteService::class);

        $this->assertSame('Hello, World!', $service->helloWorld());
    }
}