<h1 class="mb-5 login__main-title text-center">Facility Listing</h1>
<div class="container">
    <?php foreach($facility as $row){
        echo '<div class="card" style="width: 18rem;">
            <a href="'.site_url('user/facilityDetail/'.$row['FacilityID']).'">
                <img class="card-img-top" src="'.base_url().'assets/images/facility/'.$row['Image'].'" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">'.$row['FacilityName'].'</h5>
                </div>
            </a>
        </div>';
    }
    ?>
</div>