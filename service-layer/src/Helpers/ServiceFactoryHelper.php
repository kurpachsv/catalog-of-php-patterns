<?php

/**
 * Created by PhpStorm.
 * User: ksv
 * Date: 22.12.16
 * Time: 15:47
 */

namespace CatalogOfPhpPatterns\ServiceLayer\Helpers;

use CatalogOfPhpPatterns\ServiceLayer\Exceptions\HelperException;

/**
 * Class ServiceFactoryHelper
 * @package CatalogOfPhpPatterns\ServiceLayer\Helpers
 */
class ServiceFactoryHelper
{
    /**
     * @var string
     */
    protected static $serviceNamePattern = "#{{root}}\\\\Services\\\\([A-z_]+)Service#";

    /**
     * @var string
     */
    protected static $repositoryClassNamePattern = "{{root}}\\Repositories\\{{base}}Repository";

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

        $root = str_replace('\\Helpers', '', __NAMESPACE__);

        $serviceNamePattern = strtr(self::$serviceNamePattern, [
            '{{root}}' => str_replace('\\', '\\\\', $root)
        ]);

        if (preg_match($serviceNamePattern, $serviceClassName) === false) {
            throw new HelperException("Wrong service name: {$serviceClassName}. Cannot create service.");
        }

        $matches = [];
        preg_match($serviceNamePattern, $serviceClassName, $matches);

        $base = $matches[1];
        $repositoryClassName = strtr(self::$repositoryClassNamePattern, [
            '{{root}}' => $root,
            '{{base}}' => $base
        ]);

        try {
            $repository = new $repositoryClassName;
            return new $serviceClassName($repository);
        } catch (\Exception $e) {
            throw new HelperException($e->getMessage(), $e->getCode(), $e->getPrevious());
        }

    }
}