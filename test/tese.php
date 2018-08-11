<?php

if (isset($_POST['submit'])) {
  print_r($_FILES['Upload_Foto']);
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="tese" method="post" enctype="multipart/form-data">
      <input type="file" name="Upload_Foto[]" multiple>
      <input type="submit" name="submit" value="submit">
    </form>
  </body>
</html>
