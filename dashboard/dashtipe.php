<?php

require_once("../connection.php");

$querytipe = "SELECT * FROM tipe_produk";
$restype = mysqli_query($mysqli, $querytipe);

require_once("../session_check.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / Data - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- style -->
  <?php require_once('../css/phpcssadmin.php'); ?>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php require_once('admin/header.php'); ?>


  <!-- ======= Sidebar ======= -->
  <?php require_once('admin/sidebar.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tabel Tipe Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <!-- @if(session()->has('upSuccess') )
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('upSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if(session()->has('delSuccess') )
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('delSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif -->

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tabel Tipe Produk</h5>

              <a class="btn btn-primary" href="dashformTipe.php">Tambah Tipe Produk</a>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">TipeProduk</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach ($restype as $key => $value) {
                    echo '
                    <tr>
                    <th scope="row">' . $key+1 . '</th>
                    <td>' . $value['nama_tipe'] . '</td>
                    <td>
                      <form method="POST" action="dasheditTipe.php">
                        <input type="hidden" name="id_tipe" value="' . $value['id_tipe'] . '">
                        <a onclick="this.parentNode.submit();" style="color: blue;">Edit</a>
                      </form>
                      
                      <a href="/deleteTipe/' . $value['id_tipe'] . '" onclick="return confirm_delete()">Delete</a>
                    </td>
                  </tr>';
                  }
                   ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php require_once('admin/footer.php'); ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php require_once('../js/phpjsadmin.php'); ?>

</body>

</html>