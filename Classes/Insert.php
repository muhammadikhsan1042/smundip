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

  public function Update_data($table, $kolom, $value, $index)
  {
    return $this->_db->Update_data($table, $kolom, $value, $index);
  }

  public function Cek_data($table, $value=null, $kolom='*'){
    if ($this->_db->Cek_data($table, $value, $kolom)) return true;
    else return false;
  }

  public function all_Count($table, $key=null, $value=null)
  {
    return $this->_db->all_Count($table, $key, $value);
  }

  public function fil_Count($table, $kolom, $_like, $and=null)
  {
    return $this->_db->fil_Count($table, $kolom, $_like, $and);
  }

  public function Limit_data($tabel, $panjang, $awal=null, $order=null, $kolom=null, $_like=null)
  {
    return $this->_db->Limit_data($tabel, $panjang, $awal, $order, $kolom, $_like);
  }

  public function news($tabel, $order, $panjang, $awal=null, $like=null, $kolom=null, $and=null)
  {
    return $this->_db->news($tabel, $order, $panjang, $awal, $like, $kolom, $and);
  }
}
