<?php
$page = isset($_GET['a'])? (int)$_GET["a"]:1;
echo $page;

?>


<a href="/test?a=2&&b=3">2</a>
<a href="/test?a=3&&b=9">3</a>
