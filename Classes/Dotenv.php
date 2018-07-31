<?php
require_once 'vendor/autoload.php';

class Dotenv
{

  public static function env($nilai){
    $dotenv = new Dotenv\Dotenv('./');
    $dotenv->load();
    return $_ENV[$nilai];
  }
}
