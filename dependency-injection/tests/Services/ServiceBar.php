<?php

namespace CatalogOfPhpPatterns\DependencyInjection\tests\Services;

/**
 * Class ServiceTwo
 * @package CatalogOfPhpPatterns\DependencyInjection\tests\Services
 */
class ServiceBar
{
    /**
     * ServiceBar constructor
     *
     * @param ServiceBar $service
     */
    function __construct(ServiceBar $service) {	}
}