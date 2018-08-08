<?php

class Set
{
  var $SET = '';

  public function a($nilai)
  {
    $this->SET = $nilai;
  }

  public function b()
  {
    return $this->SET;
    $this->SET = '';
  }

}
