<?php
require_once("../session_check.php");

require_once("../connection.php");

if (isset($_POST['id'])) {
  $id = $_POST['id'];
}
$barang = "SELECT * FROM barang WHERE id = '{$id}'";
$resbarang = mysqli_query($mysqli, $barang);
$resbarang=mysqli_fetch_array($resbarang);

$querytipe = "SELECT * FROM tipe_produk";
$restype = mysqli_query($mysqli, $querytipe);


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
      <h1>Edit Produk</h1>
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
              <form class="row g-3" method="POST" action="../action/action_edit.php" enctype="multipart/form-data">

                <input type="hidden" name="id" class="form-control" id="id" placeholder="ID"  value="<?php echo $resbarang['id']; ?>" readonly >
                
                <div class="col-12">
                  <label class=" col-form-label">Pilih Tipe Produk</label>
                  <div class="col-12">
                    <select class="form-select" aria-label="Default select example" name="tipe_produk" required>
                      <option selected value="" placeholder="tipe" disabled>Pilih Tipe Kopi*</option>
                      <?php 
                      foreach ($restype as $key => $value) {
                        echo'
                        <option value="' . $value['nama_tipe'] . '">' . ucwords($value['nama_tipe']) . '</option>';
                      }
                       ?>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input type="text" name="nama_produk" class="form-control " id="floatingnama_produk" placeholder="Nama Produk*" required value="<?php echo $resbarang['nama_produk']; ?>" >
                    <label for="floatingnama_produk">Nama Produk*</label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-floating">
                    <textarea name="detail_komposisi" class="form-control" id="floatingdetail_komposisi" placeholder="Detail Produk" maxlength="150" style="height: 100px;"><?php echo $resbarang['detail_komposisi']; ?></textarea>
                    <label for="floatingdetail_komposisi">Detail Produk</label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-floating">
                    <input type="number" name="harga_produk" class="form-control" id="harga_produk" placeholder="Harga Produk*" required value="<?php echo $resbarang['harga_produk'] ?>">
                    <label for="harga_produk">Harga Produk*</label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-floating">
                    <input type="text" name="ukuran_kemasan" class="form-control" id="ukuran_kemasan" placeholder="Ukuran Kemasan*" required value="<?php echo $resbarang['ukuran_kemasan'] ?>">
                    <label for="ukuran_kemasan">Ukuran Kemasan*</label>
                  </div>
                </div>

                <?php 
                if (!is_null($resbarang['foto_produk']) && !empty($resbarang['foto_produk'])) {
                  echo '
                  <div class="form-group mb-2">
                    <img src="../storage/' . $resbarang['foto_produk'] . '" class="preview">
                  </div>';
                }
                 ?>
                <div class="col-12">
                  <label for="formFile" class="col-sm-2 col-form-label">Upload Gambar</label>
                  <div class="col-12">
                    <input class="form-control" type="file" id="formFile" name="foto_produk">
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