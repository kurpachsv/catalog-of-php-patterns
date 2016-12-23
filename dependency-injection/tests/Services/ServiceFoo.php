<?php

namespace CatalogOfPhpPatterns\DependencyInjection\Tests\Services;

/**
 * Class ServiceFoo
 * @package CatalogOfPhpPatterns\DependencyInjection\Tests\Services
 */
class ServiceFoo
{
    /**
     * ServiceOne constructor
     *
     * @param ServiceBar $service
     */
    function __construct(ServiceBar $service) { }
}