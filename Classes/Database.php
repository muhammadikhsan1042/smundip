<?php

require_once 'vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();


class Database
{
  private static $INSTANCE = null;
  private $mysqli;
  private $HOST     = $_ENV['DB_HOST'];
  private $USER     = $_ENV['DB_USER'];
  private $PASS     = $_ENV['DB_PASS'];
  private $DBNAME   = $_ENV['DB_NAME'];

  public function __construct()
  {
    
    $this->mysqli = new mysqli($this->HOST, $this->USER, $this->PASS, $this->DBNAME);
  }

  public static function getInstance()
  {
    if(!self::$INSTANCE){
    self::$INSTANCE = new self();
  }
    return self::$INSTANCE;
  }
  public function getConnection()
  {
  return $this->mysqli;
  }
}
