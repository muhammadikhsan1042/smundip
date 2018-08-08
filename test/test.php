<?php

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <input type="file" name="test" value="test" onchange="Lihat(this)">
  </body>
  <script type="text/javascript">
    function Lihat(a) {
      console.log(a.value);
    }
  </script>
</html>
