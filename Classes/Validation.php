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
            if (empty(trim(Input::get($item)))) {
              $this->addError($name.' Wajib Diisi', $item);
            }
            break;
          case 'min':
            if ( strlen(Input::get($item)) < $values ) {
              $this->addError($name.' Harus Lebih dari '.$values.' Karakter', $item);
            }
            break;
          case 'max':
            if ( strlen(Input::get($item)) > $values ) {
              $this->addError($name.' Harus Kurang dari '.$values.' Karakter', $item);
            }
            break;
          case 'integer':
            if ( !is_int(Input::get($item)) < $values ) {
              $this->addError($name.' Harus Angka', $item);
            }
            break;
          case 'exist':
              if (!file_exists(Input::get($item)['tmp_name'])) {
                $this->addError('File Tidak Ada', $item);
              }
            break;
          case 'size':
              if (Input::get($item)['size'] > $values) {
                $this->addError('File Terlalu Besar', $item);
              }
            break;
          case 'type':
              if (!is_int(strpos(Input::get($item)['type'], $values))) {
                $this->addError('Format File Tidak Sesuai', $item);
              }
            break;
          case 'equals':
              if ($values) {
                $this->addError($name.' Telah Terdaftar', $item);
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

  public function addError($error, $key)
  {
    if (empty($this->_errors[$key])) {
      $this->_errors[$key] = $error;
    }
  }

  public function errors(){
    return $this->_errors;
  }

  public function passed(){
    return $this->_passed;
  }

}
