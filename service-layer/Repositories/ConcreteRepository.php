<?php

/**
 * Created by PhpStorm.
 * User: ksv
 * Date: 22.12.16
 * Time: 16:02
 */

namespace CatalogOfPhpPatterns\Repositories;

use CatalogOfPhpPatterns\Interfaces\IConcreteRepository;

/**
 * Class ConcreteRepository
 * @package CatalogOfPhpPatterns\Reposities
 */
class ConcreteRepository extends GenericRepository implements IConcreteRepository
{
    /**
     * @return void
     */
    public function foo()
    {
    }

    /**
     * @return void
     */
    public function bar()
    {
    }

    /**
     * @return void
     */
    public function baz()
    {
    }
}