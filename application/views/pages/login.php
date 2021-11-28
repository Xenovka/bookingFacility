<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="<?= site_url("/home/login") ?>" method="POST">
    <label for="email">Email : </label>
    <input id='email' type="email" name="email" placeholder="Input Email">
    <p style='color: red;'><?= form_error('email') ?></p>

    <br>

    <label for="password">Password : </label>
    <input id='password' type="password" name="password" placeholder="Input Password">
    <p style='color: red;'><?= form_error('password') ?></p>

    <br>

    <?php
    if (isset($_SESSION['error'])) {
      echo "<p style='color: red'>" . $_SESSION['error'] . "<p>";
      unset($_SESSION['error']);
    }
    ?>

    <br>

    <button type="submit">Submit</button>
  </form>
</body>

</html>