<?php

  $a ='null';
  if (isset($a)) {
    echo "a";
  } else {
    echo "b";
  }

?>

<form action="test" method="post" enctype="multipart/form-data">
  <input type="file" name="Upload_Foto">
  <input type="submit" name="submit">
</form>
