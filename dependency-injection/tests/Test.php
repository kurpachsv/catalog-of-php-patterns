<?php

use CatalogOfPhpPatterns\DependencyInjection\Container;
use CatalogOfPhpPatterns\DependencyInjection\tests\Services\ServiceBar;
use CatalogOfPhpPatterns\DependencyInjection\tests\Services\ServiceFoo;

/**
 * Class Test
 */
class Test extends PHPUnit_Framework_TestCase
{
    public function test_Correct_ResolveTypeWithCtor()
    {
        $container = new Container();

        $container->register(ServiceFoo::class, ServiceFoo::class);
        $container->register(ServiceBar::class, ServiceBar::class);
        $container->resolve(ServiceFoo::class);
    }
}