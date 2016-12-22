<?php

namespace CatalogOfPhpPatterns\DependencyInjection\tests\Services;

/**
 * Class ServiceBar
 * @package CatalogOfPhpPatterns\DependencyInjection\tests\Services
 */
class ServiceBar
{
    /**
     * ServiceBar constructor
     *
     * @param ServiceFoo $service
     */
    function __construct(ServiceFoo $service) {	}
}