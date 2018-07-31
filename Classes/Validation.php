<?php

class Validation
{

  private $_passed = false,
          $_errors = array();

  public function check($value=array())
  {
    foreach ($value as $item => $rules) {
      foreach ($rules as $key => $values) {
        $name = str_replace("_", " ", $item);
        switch ($key) {
          case 'required':
            if (!isset(trim(Input::get($item))) && $values) {
              $this->addError($name.' Wajib Diisi');
            }
            break;
          case 'min':
            if ( strlen(Input::get($item)) < $values ) {
              $this->addError($name.' Harus Lebih dari '.$values.' Karakter');
            }
            break;
          case 'max':
            if ( strlen(Input::get($item)) > $values ) {
              $this->addError($name.' Harus Kurang dari '.$values.' Karakter');
            }
            break;
          case 'integer':
            if ( !is_int(Input::get($item)) < $values ) {
              $this->addError($name.' Harus Angka');
            }
            break;
          case 'exist':
              if (!file_exists(Input::get($item)['tmp_name'])) {
                $this->addError('File Tidak Ada');
              }
            break;
          case 'size':
              if (Input::get($item)['size'] > $values) {
                $this->addError('File Terlalu Besar');
              }
            break;
          case 'type':
              if (!is_int(strpos(Input::get($item)['type'], $values))) {
                $this->addError('Format File Tidak Sesuai');
              }
            break;
          default:

            break;
        }
      }
    }

    if (empty($this->_errors))$this->_passed=true;
    return $this;

  }

  public function addError($error)
  {
    $this->_errors[] = $error;
  }

  public function errors(){
    return $this->_errors;
  }

  public function passed(){
    return $this->_passed;
  }

}
