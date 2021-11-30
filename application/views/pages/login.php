<div class="container login__wrapper">
  <h1 class="text-center mb-5 login__main-title">Login Here</h1>
  
  <?php
    // if($this->session->flashdata('fail_captcha'))
    // {
    //   echo '<div class="alert alert-danger">';
    //   echo $this->session->flashdata('fail_captcha');
    //   echo '</div>';
    // }
    // if($this->session->flashdata('success_captcha'))
    // {
    //   echo '<div class="alert alert-success">';
    //   echo $this->session->flashdata('success_captcha');
    //   echo '</div>';
    // }
  ?>
  <form action="<?= site_url("/home/login") ?>" method="POST">
    <div class="mb-3">
      <label class="form-label" for="email">Email</label>
      <input class="form-control" id='email' type="email" name="email" placeholder="Input Email">
    </div>
    <p class="alert alert-danger"><?= form_error('email') ?></p>

    <div class="mb-3">
      <label class="form-label" for="password">Password</label>
      <input class="form-control" id='password' type="password" name="password" placeholder="Input Password ">
    </div>
    <p class="alert alert-danger"><?= form_error('password') ?></p>

    <?php
      if (isset($_SESSION['error'])) {
        echo "<p style='color: red'>" . $_SESSION['error'] . "<p>";
        unset($_SESSION['error']);
      }
    ?>
    <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div> 
    <button class="btn login__button" type="submit">Submit</button>
  </form>

  <div>
    <p class="text-center mt-5 register__footer">Does not have an account?
      <a href="<?= base_url('index.php/home/register'); ?>" class="register__redirect">Register</a> now!
    </p>
  </div>
</div>