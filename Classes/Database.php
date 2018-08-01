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

    public function runQuery($query, $type = true)
    {
      $resault = $this->mysqli->query($query);
      if ($type) {
        if ($resault && $resault->num_rows > 0)return true;
        else return false;
      } else {
        if ($resault && $resault->num_rows > 0)return $this->mysqli->query($query);
        return null;
      }
    }

    public function Cek_data($table, $kolom, $value){
      if (isset($value)) {
        $query = "SELECT $kolom FROM $table WHERE $kolom=$value";
      } else {
        $query = "SELECT $kolom FROM $table";
      }
      return $this->runQuery($query);
    }

    public function Select_data($table, $kolom, $value){
      if (isset($value)) {
        $query = "SELECT $kolom FROM $table WHERE $kolom=$value";
      } else {
        $query = "SELECT $kolom FROM $table";
      }
      return $this->runQuery($query, false);
    }

    public function Limit_data($tabel, $kolom, $awal, $panjang){
      if (isset($awal)) {
        $query = "SELECT $kolom FROM $tabel LIMIT $awal, $panjang";
      } else{
        $query = "SELECT $kolom FROM $tabel LIMIT $panjang";
      }
      return $this->runQuery($query, false);
    }

    public function escape($value)
    {
      return $this->mysqli->real_escape_string(strip_tags($value));
    }

}
