<?php

/**
 * ContestTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ContestTable extends ProgramTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object ContestTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Contest');
    }
}