<?php
namespace App\Services\Paynet;

class Constants
{
    // минималная сумма на сумах
    public static $minimum_amount; 
    // логин пайнета
    public static $paynet_username;
    // пароль пайнета
    public static $paynet_password;
    // идентификатор сервиса пайнета
    public static $paynet_serice_id;
    // URL на файла wsdl.php
    public static $wsdl_url;
    // URL на файла index.php (где написано SoapServer)
    public static $index_url;

    public function __construct(){
        self::$minimum_amount   = config('constants.paynet.minimum_amount');
        self::$paynet_username  = config('constants.paynet.paynet_username');
        self::$paynet_password  = config('constants.paynet.paynet_password');
        self::$paynet_serice_id = config('constants.paynet.paynet_service_id');
        self::$wsdl_url         = config('constants.paynet.wsdl_url');
        self::$index_url        = config('constants.paynet.index_url');
    }
}