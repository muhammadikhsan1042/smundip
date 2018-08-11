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

  /*================MEMASUKAN DATA=================*/

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

    /*================MENGANTI DATA=================*/
    public function Update_data($tabel, $kolom, $value, $index){
      $query = "UPDATE $tabel SET $kolom = '$value' WHERE id = $index";

      return $this->runQuery($query);
    }

    /*================PENGECEKAN DATA=================*/

    public function Cek_data($table, $value, $kolom){
      if (isset($value)) {
        $query = "SELECT $kolom FROM $table WHERE $kolom='$value'";
      } else {
        $query = "SELECT $kolom FROM $table";
      }
      return $this->runCekQuery($query);
    }


    /*================PENGAMBILAN DATA=================*/

    public function all_Count($table, $key, $value){
      if (isset($value) && isset($key)) {
        $query = "SELECT * FROM $table WHERE $key='$value'";
      } else {
        $query = "SELECT * FROM $table";
      }
      return $this->runCekQuery($query, false);
    }

    public function fil_Count($table, $kolom, $_like, $and){
      if (!isset($and)) {
        $query = "SELECT * FROM $table WHERE $kolom LIKE '$_like'";
      } else {
        $query = "SELECT * FROM $table WHERE $kolom LIKE '$_like' OR $and LIKE '$_like'";
      }
      return $this->runCekQuery($query, false);
    }

    public function Limit_data($tabel, $panjang, $awal, $order, $kolom, $_like){
      if (isset($awal) && !isset($order) && !isset($kolom)) {
        $query = "SELECT * FROM $tabel LIMIT $awal, $panjang";
      } elseif(!isset($awal) && !isset($order) && !isset($kolom)){
        $query = "SELECT * FROM $tabel LIMIT $panjang";
      } elseif (isset($awal) && isset($order) && !isset($kolom)) {
        $query = "SELECT * FROM $tabel ORDER BY $order LIMIT $awal, $panjang";
      } elseif (!isset($awal) && isset($order) && !isset($kolom)) {
        $query = "SELECT * FROM $tabel ORDER BY $order LIMIT $panjang";
      } elseif (!isset($awal) && isset($order) && isset($kolom)) {
        $query = "SELECT * FROM $tabel WHERE $kolom LIKE '$_like' ORDER BY $order LIMIT $panjang";
      } elseif (isset($awal) && isset($order) && isset($kolom)) {
        $query = "SELECT * FROM $tabel WHERE $kolom LIKE '$_like' ORDER BY $order LIMIT $awal, $panjang";
      }
      return $this->runCekQuery($query, false);
    }

    public function news($tabel, $order, $panjang, $awal, $like, $kolom, $and){
      if (!isset($awal) && !isset($like) && !isset($and)) {
        $query = "SELECT * FROM $tabel ORDER BY $order DESC LIMIT $panjang";
      } elseif (isset($awal) && !isset($like) && !isset($and)) {
        $query = "SELECT * FROM $tabel ORDER BY $order DESC LIMIT $awal, $panjang";
      } elseif (isset($awal) && isset($like) && !isset($and)) {
        $query = "SELECT * FROM $tabel WHERE $kolom LIKE '$like' ORDER BY $order DESC LIMIT $awal, $panjang";
      } elseif (isset($awal) && isset($like) && isset($and)) {
        $query = "SELECT * FROM $tabel WHERE $kolom LIKE '$like' OR $and LIKE '$like' ORDER BY $order DESC LIMIT $awal, $panjang";
      }

      return $this->runCekQuery($query, false);
    }

    /*================MENJALANKAN QUERY=================*/
    public function runQuery($query)
    {
      if ($this->mysqli->query($query))return true;
      else return false;
    }

    public function runCekQuery($query, $type = true)
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

    public function escape($value)
    {
      return $this->mysqli->real_escape_string(strip_tags($value));
    }

}
