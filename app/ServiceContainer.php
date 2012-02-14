<?php
require_once dirname(__FILE__) . '/Controller/TestController.php';

class ServiceContainer
{
    static protected $instances = array();
    
    public function getTestController()
    {
        if (!isset(self::$instances['TestController'])) {
            self::$instances['TestController'] = new TestController($this);
        }
        return self::$instances['TestController'];
    }
    
    public function getApp()
    {
        if (!isset(self::$instances['app'])) {
            self::$instances['app'] = new Slim(array(
                                                     'http.version' => '1.0',
                                                     'log.enable' => true,
                                                     'log.path' => './logs'
                                                     ));
        }
        return self::$instances['app'];
    }
}
