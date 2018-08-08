<?php

require_once __DIR__.'/../Core/Init.php';

  /*=============LOGIN==============*/

  $errors = null;

  if (Input::get('Masuk')) {

    //1. Pemanggilan Validasi
    $validation = new Validation();

    //2. Metode Check
    $validation->check(array(
      'Username' => array(
          'equals' => 'USER_ADMIN',
      ),
      'Password' => array(
          'equals' => 'PASS_ADMIN'
      ),
    ));

    if ($validation->passed()) {
      $result = $Insert->Update_data('set_token', 'longString', Input::get('Token'), 1);
      if ($result) {
        $cek = setcookie('USER_ADMIN', Input::get('Token'), time() + (360000), "smundip.com/");
        if ($cek) {
          header("location: /Aktivitas/Admin");
        }
      }
    } else {
      $errors = $validation->errors();
    }
  }

  /*=============CEK USER==============*/

  if (isset($_COOKIE['USER_ADMIN'])) {
    $_bool = $Insert->Cek_data('set_token', $_COOKIE['USER_ADMIN'], 'longString');
    if ($_bool) {
      header("location: /Aktivitas/Admin");
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Walcome Admin</title>
  </head>
  <body>
    <div>
      <h1>WELCOME ADMIN</h1>
      <form action="/Aktivitas/Login_Admin" method="post">
        <input type="hidden" name="Token" value="<?php echo Token::set(64); ?>">
        <input type="text" name="Username" placeholder="Username">
        <input type="password" name="Password" placeholder="Password">
        <input type="submit" name="Masuk" value="Masuk">
      </form>
    </div>
  </body>
</html>
