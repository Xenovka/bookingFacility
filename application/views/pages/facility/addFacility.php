<!-- Sama ini juga masi pake register jadi class masi register semua -->
<div class="container register__wrapper">
  <h1 class="text-center mb-5 register__main-title">Add Facility</h1>

  <?php 
			if($this->session->flashdata('error') !='')
			{
				echo '<div class="alert alert-danger" role="alert">';
				echo $this->session->flashdata('error');
				echo '</div>';
			}
		?>

  <form method="post" action="<?php echo base_url('index.php/facilities/addCheck'); ?>">
    <div class="mb-3">
      <label for="FacilityName" class="form-label">Facility Name</label>
      <input type="text" class="form-control" name="FacilityName" id="FacilityName" placeholder="Enter FacilityName">
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="text" class="form-control" name="image" id="image" placeholder="image">
    </div>
    <button type="submit" class="btn register__button">Submit</button>
  </form>
</div>