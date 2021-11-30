<!-- Ni gw copas dari register jadi class nya masi register semua -->
<!-- Belom ada edit image -->
<div class="container register__wrapper">
  <h1 class="text-center mb-5 register__main-title">Edit Facility</h1>

  <?php 
			if($this->session->flashdata('error') !='')
			{
				echo '<div class="alert alert-danger" role="alert">';
				echo $this->session->flashdata('error');
				echo '</div>';
			}
		?>

  <form method="post" action="<?php echo base_url('index.php/facilities/editCheck'); ?>">
  <?php
    foreach ($facility as $each) {
        echo "
            <div class='mb-3'>
                <label for='FacilityID' class='form-label'>Facility ID</label>
                <input type='text' class='form-control' name='FacilityID' id='FacilityID' value='{$each['FacilityID']}' disabled>
                <input type='hidden' class='form-control' name='FacilityID' id='FacilityID' value='{$each['FacilityID']}'>
            </div>
            <div class='mb-3'>
                <label for='FacilityName' class='form-label'>Facility Name</label>
                <input type='text' class='form-control' name='FacilityName' id='FacilityName' value='{$each['FacilityName']}'>
            </div>
            
            <button type='submit' class='btn register__button'>Submit</button>";
     }
    ?>
  </form>
</div>