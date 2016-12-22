<?php

use CatalogOfPhpPatterns\DependencyInjection\Container;
use CatalogOfPhpPatterns\DependencyInjection\tests\Services\ServiceBar;
use CatalogOfPhpPatterns\DependencyInjection\tests\Services\ServiceOne;

/**
 * Class Test
 */
class Test extends PHPUnit_Framework_TestCase
{
    public function test_Correct_ResolveTypeWithCtor()
    {
        $container = new Container();

        $container->register(ServiceOne::class, ServiceOne::class);
        $container->register(ServiceBar::class, ServiceBar::class);
        $container->resolve(ServiceOne::class);
    }
}