<?php

/**
 * Created by PhpStorm.
 * User: ksv
 * Date: 22.12.16
 * Time: 15:47
 */

namespace CatalogOfPhpPatterns\Helpers;

use CatalogOfPhpPatterns\Exceptions\HelperException;

/**
 * Class ServiceFactoryHelper
 * @package CatalogOfPhpPatterns\Helpers
 *
 * Usage:
 * $service = ServiceFactoryHelper::create(ConcreteService::class);
 */
class ServiceFactoryHelper
{
    /**
     * @var string
     */
    protected static $root = 'service-layer';

    /**
     * @var string
     */
    protected static $serviceNamePattern = null;

    /**
     * ServiceFactoryHelper constructor
     */
    protected function __construct()
    {
        $root = self::$root;
        self::$serviceNamePattern = "#{$root}\\\\Services\\\\([A-z_]+)Service#";
    }

    /**
     * @param $serviceClassName
     * @return mixed
     * @throws HelperException
     */
    public static function create($serviceClassName)
    {
        if (empty($serviceClassName)) {
            throw new HelperException('Service name cannot be empty.');
        }

        if (preg_match(self::$serviceNamePattern, $serviceClassName) === false) {
            throw new HelperException("Wrong service name: {$serviceClassName}. Cannot create service.");
        }

        $root = self::$root;
        $matches = [];
        preg_match(self::$serviceNamePattern, $serviceClassName, $matches);

        $base = $matches[1];
        $repositoryClassName = "{$root}\\Repositories\\{$base}Repository";

        try {
            $repository = new $repositoryClassName;
            return new $serviceClassName($repository);
        } catch (\Exception $e) {
            throw new HelperException($e->getMessage(), $e->getCode(), $e->getPrevious());
        }

    }
}