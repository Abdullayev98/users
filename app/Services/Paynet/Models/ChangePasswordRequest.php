<?php
namespace App\Services\Paynet\Models;

class ChangePasswordRequest extends GenericRequest
{
    /**
     * @access public
     * @var string
     */
    public $newPassword;
}