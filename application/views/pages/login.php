<div class="container login__wrapper">
<?php
      if($this->session->flashdata('message'))
      {
    ?>
        <div class="alert alert-danger">
            <?php
            echo $this->session->flashdata('message');
            ?>
        </div>
    <?php
    }

    if($this->session->flashdata('success_message'))
    {
    ?>
        <div class="alert alert-success">
            <?php
            echo $this->session->flashdata('success_message');
            ?>
        </div>
    <?php
    }
    ?>
  <h1 class="text-center mb-5 login__main-title">Login Here</h1>
  <form action="<?= site_url("/home/login") ?>" method="POST">
    <div class="mb-3">
      <label class="form-label" for="email">Email</label>
      <input class="form-control" id='email' type="email" name="email" placeholder="Input Email">
    </div>
    <?= form_error('email', "<p class='alert alert-danger'>", "</p>") ?>

    <div class="mb-3">
      <label class="form-label" for="password">Password</label>
      <input class="form-control" id='password' type="password" name="password" placeholder="Input Password ">
    </div>
    <?= form_error('password', "<p class='alert alert-danger'>", "</p>") ?>

    <?php
      if (isset($_SESSION['error'])) {
        echo "<p style='color: red'>" . $_SESSION['error'] . "<p>";
        unset($_SESSION['error']);
      }
    ?>
    <div class="g-recaptcha" data-sitekey="6Lf6Cm8dAAAAAGflr6iNKHEh6x27kZ2OScKS7anq"></div>
    <button class="btn login__button" type="submit">Submit</button>
  </form>

  <div>
    <p class="text-center mt-5 register__footer">Does not have an account?
      <a href="<?= base_url('index.php/home/register'); ?>" class="register__redirect">Register</a> now!
    </p>
  </div>
</div>