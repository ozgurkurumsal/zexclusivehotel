<?php

require_once(dirname(__DIR__).'/IyzipayBootstrap.php');
require_once('../../services/rezervasyon.php');


IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey('MVLMcVWTD8sTPtYb8bdpRL261H6tDPk5');
        $options->setSecretKey('M5ooYQ8b7wKuuZx6zNeTGj4qoAA3ZCHf');
        $options->setBaseUrl('https://api.iyzipay.com');
        // $options->setBaseUrl('https://sandbox-api.iyzipay.com');

        return $options;
    }
}