<div class="container pt-3">
<a style="float:right" href="admin/addUser"><button class="btn btn-primary">Add</button></a>
  <table class='table table-striped' id="dataTable">
    <thead class='sementara'>
      <th>User ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>Role</th>
      <th>Operation</th>
    </thead>

    <tbody>
      <?php
      foreach ($user as $each) {
        echo "
            <tr class='sementara'>
              <td>{$each['UserID']}</td>
              <td>{$each['Username']}</td>
              <td>{$each['Email']}</td>
              <td>{$each['Role']}</td>
              <td>
                <a href=".site_url("admin/editUser/{$each['UserID']}")." style='width:20%' class='btn btn-primary'>Edit</a>
                <a onclick=\"return confirm('Anda yakin ingin menghapus {$each['Username']} ?')\" title='Delete {$each['Username']}' href='" . site_url("admin/deleteUser/{$each['UserID']}") . "' style='width:20%' class='btn btn-danger'>X</a></td>
            </tr>
          ";
        // Buat foto siapa tau ntar dipake
        //   <td> 
        //     <img width='110px' src='{$each['foto_dosen']}' alt='Foto {$each['fname_dosen']} {$each['lname_dosen']}'>
        //   </td>
      }
      ?>
    </tbody>
  </table>
</div>