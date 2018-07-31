<?php

class Database
{
  private static $INSTANCE = null;
  private $mysqli, $HOST, $USER, $PASS, $DBNAME;

  public function __construct()
  {
    $this->HOST     = Dotenv::env('DB_HOST');
    $this->USER     = Dotenv::env('DB_USER');
    $this->PASS     = Dotenv::env('DB_PASS');
    $this->DBNAME   = Dotenv::env('DB_NAME');
    $this->mysqli   = new mysqli($this->HOST, $this->USER, $this->PASS, $this->DBNAME);
  }

  public static function getInstance()
  {
    if(!self::$INSTANCE)self::$INSTANCE = new self();
    return self::$INSTANCE;
  }

  public function post($table, $value=array())
  {

      // Mengambil Kolom
      $kolom = implode(", ", array_keys($value));

      // Mengambil Nilai
      $valueArrays = array();
      foreach ($value as $key => $values) {
        if (is_int($values)) array_push($valueArrays, $this->escape($values));
        else array_push($valueArrays, "'".$this->escape($values)."'");
      }

      $nilai = implode(", ", $valueArrays);

      $query = "INSERT INTO $table ($kolom) VALUES ($nilai)";

      return $this->runQuery($query);

    }

    public function runQuery($query)
    {
      if ($this->mysqli->query($query))return true;
      else return false;
    }

    public function escape($value)
    {
      return $this->mysqli->real_escape_string(strip_tags($value));
    }

}
