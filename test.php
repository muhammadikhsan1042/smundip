<?php

$cars=array();
if (!empty(count($cars))) {
  echo "Teruskan";
} else {
  echo "Berhenti";
}

?>

<form action="test" method="post" enctype="multipart/form-data">
  <input type="text" name="test" value="">
  <input type="submit" name="submit">
</form>
