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
}
