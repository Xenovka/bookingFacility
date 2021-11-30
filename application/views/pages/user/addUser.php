<!-- Sama ini juga masi pake register jadi class masi register semua -->
<div class="container register__wrapper">
  <h1 class="text-center mb-5 register__main-title">Add User</h1>

  <?php 
			if($this->session->flashdata('error') !='')
			{
				echo '<div class="alert alert-danger" role="alert">';
				echo $this->session->flashdata('error');
				echo '</div>';
			}
		?>

  <form method="post" action="<?php echo base_url('index.php/admin/addCheck'); ?>">
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
    <div class="mb-3">
      <label for="role" class="form-label">Role</label>
      <select id="role" name="role">
        <option value="Admin">Admin</option>
        <option value="Management">Management</option>
        <option value="User">User</option>
        </select>
    </div>
    <button type="submit" class="btn register__button">Submit</button>
  </form>
</div>