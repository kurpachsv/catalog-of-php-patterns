<?php

namespace CatalogOfPhpPatterns\DependencyInjection\tests\Services;

/**
 * Class ServiceFoo
 * @package CatalogOfPhpPatterns\DependencyInjection\tests\Services
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