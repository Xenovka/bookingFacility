<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<?php echo $style; ?>
	</head>
	<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h1 style="">Register Now!</h1>
			</div>
			<div class="card-body">
				<?php 
				if($this->session->flashdata('error') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('error');
					echo '</div>';
				}
				?>
				<form method="post" action="<?php echo base_url(); ?>index.php/home/registCheck">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
					</div>
                    <div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" name="email" id="email" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
					</div>
			
					<button type="submit" class="btn btn-primary">Register</button>
				</form>
                <div style="margin: 2% 0 0 43%">
                    <a href="<?php echo base_url('index.php/home/login')?>">Return to Login Page</a>
                </div>
			</div>
		</div>
	</div>		
	</body>
</html>