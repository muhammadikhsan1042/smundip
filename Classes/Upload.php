<?php

class Upload
{
  public function setFile($asal, $tujuan)
  {
    if(move_uploaded_file($asal, $tujuan))return true;
    else return false;
  }
}
