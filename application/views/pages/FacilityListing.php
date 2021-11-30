<div class="container pt-3">
  <table class='table table-striped' id="dataTable">
    <thead class='sementara'>
      <th>Facility ID</th>
      <th>Image</th>
      <th>Name</th>
      <th>Operation</th>
    </thead>

    <tbody>
      <?php
      foreach ($facility as $each) {
        echo "
            <tr class='sementara'>
              <td>{$each['FacilityID']}</td>
              <td>{$each['FacilityName']}</td>
              <td> 
                 <img width='110px' src='".base_url($each['Image'])."' alt='Foto {$each['FacilityName']}'>
             </td>
              <td>
                <a href=".site_url("admin/editFacility/{$each['FacilityID']}")." style='width:20%' class='btn btn-primary'>Edit</a>
                <a onclick=\"return confirm('Anda yakin ingin menghapus {$each['FacilityName']} ?')\" title='Delete {$each['FacilityName']}' href='" . site_url("admin/deleteFacility/{$each['FacilityID']}") . "' style='width:20%' class='btn btn-danger'>X</a></td>
            </tr>
          ";
      }
      ?>
    </tbody>
  </table>
</div>