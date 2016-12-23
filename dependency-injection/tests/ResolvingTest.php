<?php

use CatalogOfPhpPatterns\DependencyInjection\Container;
use CatalogOfPhpPatterns\DependencyInjection\Tests\Services\ServiceBar;
use CatalogOfPhpPatterns\DependencyInjection\Tests\Services\ServiceFoo;

/**
 * Class ResolvingTest
 */
class ResolvingTest extends PHPUnit_Framework_TestCase
{
    public function test_Correct_ResolveTypeWithCtor()
    {
        $container = new Container();

        $container->register(ServiceFoo::class, ServiceFoo::class);
        $container->register(ServiceBar::class, ServiceBar::class);

        $container->resolve(ServiceFoo::class);
        $container->resolve(ServiceBar::class);
    }
}