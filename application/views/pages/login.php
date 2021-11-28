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