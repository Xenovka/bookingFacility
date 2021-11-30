<div class="container register__wrapper">
  <h1 class="text-center mb-5 register__main-title">Register Here</h1>

  <?php 
			if($this->session->flashdata('error') !='')
			{
				echo '<div class="alert alert-danger" role="alert">';
				echo $this->session->flashdata('error');
				echo '</div>';
			}
		?>
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

  <form method="post" action="<?php echo base_url('index.php/home/registCheck'); ?>">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" name="email" id="email" placeholder="Email">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
    <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div> 
    <button type="submit" class="btn register__button">Register</button>
  </form>

  <div>
    <p class="text-center mt-5 register__footer">Have an account?
      <a href="<?= base_url('index.php/home/login'); ?>" class="register__redirect">Login</a> now!
    </p>
  </div>
</div>