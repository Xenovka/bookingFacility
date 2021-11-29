<!-- Ni gw copas dari register jadi class nya masi register semua -->
<div class="container register__wrapper">
  <h1 class="text-center mb-5 register__main-title">Edit User</h1>

  <?php 
			if($this->session->flashdata('error') !='')
			{
				echo '<div class="alert alert-danger" role="alert">';
				echo $this->session->flashdata('error');
				echo '</div>';
			}
		?>

  <form method="post" action="<?php echo base_url('index.php/admin/editCheck'); ?>">
  <?php
    foreach ($user as $each) {
        echo "
            <div class='mb-3'>
                <label for='UserID' class='form-label'>User ID</label>
                <input type='text' class='form-control' name='UserID' id='UserID' value='{$each['UserID']}' disabled>
                <input type='hidden' class='form-control' name='UserID' id='UserID' value='{$each['UserID']}'>
            </div>
            <div class='mb-3'>
                <label for='username' class='form-label'>Username</label>
                <input type='text' class='form-control' name='username' id='username' value='{$each['Username']}'>
            </div>
            <div class='mb-3'>
                <label for='email' class='form-label'>Email</label>
                <input type='text' class='form-control' name='email' id='email' value='{$each['Email']}'>
            </div>
            
            <button type='submit' class='btn register__button'>Submit</button>";
     }
    ?>
  </form>
</div>