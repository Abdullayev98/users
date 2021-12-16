<?php
namespace App\Services\Paynet\Models;

class GenericParam
{
    /**
     * @access public
     * @var string
     */
    public $paramKey;
    /**
     * @access public
     * @var string
     */
    public $paramValue;

    public function __construct($paramKey = "", $paramValue = "")
    {
        $this->paramKey = $paramKey;
        $this->paramValue = $paramValue;
    }
}