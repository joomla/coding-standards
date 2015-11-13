<?php

class A
{
    /**
     * Description
     *
     * @var string
     */
    public $varWithDescription;

    /**
     * @var string
     */
    public $varWithDoc;

    /** @var string Description */
    public $varWithOneLineDoc;

    public $varWithoutDoc;

    /**
     * @var string
     * @var string
     */
    public $varWithDoubleDoc;

    /**
     * @var string
     * @see reference
     */
    public $varWithSee;

    /**
     * @see reference
     * @var string
     */
    public $varWithWrongOrder;

    /**
     * @var string
     * @see
     */
    public $varWithEmptySee;

    /**
     * @var string
     * @since version
     */
    public $varWithOtherTag;

    /**
     * @var
     */
    public $varWithEmptyVar;

    /**
     * @var integer
     */
    public $varWithWrongType = 'string'';
}
