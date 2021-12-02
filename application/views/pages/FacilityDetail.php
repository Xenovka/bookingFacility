    <?php foreach($facility as $row){
        echo '<h1 class="mb-5 login__main-title text-center">'.$row['FacilityName'].'</h1>
                <div class="container">
                    <a href="'.site_url('user/facilityDetail/'.$row['FacilityID']).'">
                        <img class="card-img-top" src="'.base_url().'assets/images/facility/'.$row['Image'].'" alt="Card image cap">
                    </a>
                    <div>
                        <p>
                            '.$row['FacilityDetail'].'
                        </p>
                    </div>
                    <div>
                        <a href="http://localhost/bookingFacility/index.php/user/requests/add"><button class="btn btn-primary">Book</button></a>
                        <a href="'.site_url('user').'"><button class="btn btn-primary">Back</button></a>
                    </div>
                </div>';
    }
    ?>
</div>