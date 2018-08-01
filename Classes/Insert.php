<?php

class Insert
{

  private $_db;

  function __construct()
  {
    $this->_db = Database::getInstance();
  }

  public function Post_data($table, $value = array())
  {
    if ($this->_db->post($table, $value)) return true;
    else return false;
  }

  public function Cek_data($table, $kolom='*', $value=null){
    if ($this->_db->Cek_data($table, $kolom, $value)) return true;
    else return false;
  }

  public function Select_data($table, $kolom='*', $value=null)
  {
    return $this->_db->Select_data($table, $kolom, $value);
  }

  public function Limit_data($tabel, $kolom='*', $awal=null, $panjang)
  {
    return $this->_db->Limit_data($tabel, $kolom, $awal, $panjang);
  }
}
