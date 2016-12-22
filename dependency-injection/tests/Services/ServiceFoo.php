<?php

namespace CatalogOfPhpPatterns\DependencyInjection\tests\Services;

/**
 * Class ServiceOne
 * @package CatalogOfPhpPatterns\DependencyInjection\tests\Services
 */
class ServiceOne
{
    /**
     * ServiceOne constructor
     *
     * @param ServiceBar $service
     */
    function __construct(ServiceBar $service) { }
}