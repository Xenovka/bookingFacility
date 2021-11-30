<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://code.jquery.com/jquery-3.5.1.js'></script>
  <script src='https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js'></script>
  <script src='https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js'></script>
  <!-- <title>testing</title> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
  <style>
    * {
      padding: 0;
      margin: 0;
    }

    li.currentPage {
      background: #ddd;
      border-radius: 10px;
      box-sizing: border-box;
      box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    }

    .currentPage a {
      color: black !important;
      font-weight: 630;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <b><a class="navbar-brand" style="color:#05F" href="<?= site_url("home/dashboard") ?>">Facility Boooking</a></b>
      <button class="navbar-toggler mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item me-2 <?php if ($this->uri->segment(3, NULL) == NULL || $this->uri->segment(3, NULL) == 'users') echo 'currentPage' ?>">
            <a class="nav-link" href="<?= site_url("admin") ?>">Users</a>
          </li>
          <li class="nav-item me-2 <?php if ($this->uri->segment(3, NULL) == 'facilities') echo 'currentPage' ?>">
            <a class="nav-link" href="<?= site_url("facilities") ?>">Facilities</a>
          </li>
          <li class="nav-item">
            <select onchange="logout()" class="form-select form-select-sm mt-1" aria-label=".form-select-sm example">
              <option disabled selected hidden value="">Halo, <?php echo (isset($_SESSION["accountFullName"])) ? $_SESSION["accountFullName"] : "login dulu ya..."; ?></option> <!-- controller method tidak ada && status belum login ? -->
              <option value="logout"><?php echo (isset($_SESSION["accountFullName"])) ? "logout" : "login"; ?> </option> <!-- controller method tidak ada && status belum login ? -->
            </select>
          </li>
      </div>
    </div>
  </nav>