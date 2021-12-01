<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <?php foreach ($crud['css_files'] as $file): ?>
  <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
  <?php endforeach; ?>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <b><a class="navbar-brand" href="<?= base_url() ?>">Facility Boooking</a></b>
      <button class="navbar-toggler mb-2" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li
            class="nav-item me-2 <?php if ($this->uri->segment(2, NULL) == NULL || $this->uri->segment(2, NULL) == 'user') echo 'currentPage' ?>">
            <a class="nav-link" href="<?= site_url("admin") ?>">Users</a>
          </li>
          <li class="nav-item me-2 <?php if ($this->uri->segment(2, NULL) == 'facilities') echo 'currentPage' ?>">
            <a class="nav-link" href="<?= site_url("admin/facilities") ?>">Facilities</a>
          </li>
          <li class="nav-item me-2 <?php if ($this->uri->segment(2, NULL) == 'requests') echo 'currentPage' ?>">
            <a class="nav-link" href="<?= site_url("admin/requests") ?>">Requests</a>
          </li>
          <li class="nav-item ms-auto">
          </li>
      </div>
      <div class='ms-auto' class="collapse navbar-collapse" id="navbarSupportedContent">
        <select onchange="logout()" class="form-select form-select-lg mt-1" aria-label=".form-select-sm example">
          <option disabled selected hidden value="">Halo,
            <?php echo (isset($_SESSION["account"])) ? $_SESSION["account"]['Username'] : "login dulu ya..."; ?>
          </option> <!-- controller method tidak ada && status belum login ? -->
          <option value="logout"><?php echo (isset($_SESSION["account"])) ? "logout" : "login"; ?> </option>
          <!-- controller method tidak ada && status belum login ? -->
        </select>
      </div>
    </div>
  </nav>
  <?= $contents; ?>

  <script src='https://code.jquery.com/jquery-3.5.1.js'></script>
  <script src='https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js'></script>
  <script src='https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <?php foreach ($crud['js_files'] as $file): ?>
  <script src="<?php echo $file; ?>"> </script>
  <?php endforeach; ?>
  <script>
  function logout() {
    document.location.href = "<?= site_url("home/logout") ?>";
  }

  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
  </script>
</body>

</html>