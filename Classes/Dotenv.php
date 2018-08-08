<?php

class Dotenv
{
  public static function env($nilai){
    $dotenv = new Dotenv\Dotenv(__DIR__.'/../');
    $dotenv->load();
    return $_ENV[$nilai];
  }
}
