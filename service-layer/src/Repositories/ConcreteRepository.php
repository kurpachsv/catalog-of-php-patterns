<?php

/**
 * Created by PhpStorm.
 * User: ksv
 * Date: 22.12.16
 * Time: 16:02
 */

namespace CatalogOfPhpPatterns\ServiceLayer\Repositories;

use CatalogOfPhpPatterns\ServiceLayer\Interfaces\IConcreteRepository;

/**
 * Class ConcreteRepository
 * @package CatalogOfPhpPatterns\ServiceLayer\Repositories
 */
class ConcreteRepository extends GenericRepository implements IConcreteRepository
{
    /**
     * @return string
     */
    public function foo()
    {
        return 'Hello';
    }

    /**
     * @return string
     */
    public function bar()
    {
        return "World";
    }
}