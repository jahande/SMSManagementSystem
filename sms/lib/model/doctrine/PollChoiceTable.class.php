<?php

/**
 * PollChoiceTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PollChoiceTable extends ChoiceTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object PollChoiceTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PollChoice');
    }
}