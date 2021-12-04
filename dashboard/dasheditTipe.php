<?php

require_once("../connection.php");

$querytipe = "SELECT * FROM tipe_produk WHERE id_tipe = $_POST['id_tipe']";
$restype = mysqli_query($mysqli, $querytipe);

$restype=mysqli_fetch_array($restype);

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
      <h1>Edit Tipe Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Form</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" method="POST" action="../action/action_edtipe.php">

                <input type="hidden" name="id_tipe" class="form-control" id="id_tipe" placeholder="ID"  value="<?php echo $restype['id_tipe']; ?>" readonly >

                <div class="col-12">
                  <div class="form-floating">
                    <input type="text" name="nama_tipe" class="form-control" id="floatingnama_tipe" placeholder="Nama Tipe Produk*" required value="<?php echo $restype['nama_tipe']; ?>" >
                    <label for="floatingnama_tipe">Nama Tipe Produk*</label>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

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