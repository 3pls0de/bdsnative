<?php

require_once("../session_check.php");
require_once("../connection.php");

$queryseo = "SELECT * FROM seo";
$resseo = mysqli_query($mysqli, $queryseo);
$resseo=mysqli_fetch_array($resseo);

$xindex = "";
$noindex = "";
$xfollow = "";
$nofollow = "";
if ($resseo['xindex'] == "index") {
  $xindex = "selected";
} else {
  $noindex = "selected";
}
if ($resseo['xfollow'] == "follow") {
  $xfollow = "selected";
} else {
  $nofollow = "selected";
}

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
      <h1>Tambah Produk</h1>
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
              <h5 class="card-title">Floating labels Form</h5>
              <p>Pisahkan dengan tanda koma (,) jika ada lebih dari satu (Author / Kata Kunci / Deskripsi) </p>

              <!-- Floating Labels Form -->
              <form class="row g-3" method="POST" action="../action/action_seo.php">
                <div class="col-12">
                  <div class="form-floating">
                    <input type="text" name="author" class="form-control" id="floatingauthor" placeholder="Author/Penulis*" required value="<?php echo $resseo['author']; ?>" >
                    <label for="floatingauthor">Author/Penulis*</label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-floating">
                    <textarea name="description" class="form-control" id="floatingdescription" placeholder="Deskripsi" maxlength="150" style="height: 100px;"><?php echo $resseo['description']; ?></textarea>
                    <label for="floatingdescription">Deskripsi</label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-floating">
                    <textarea name="keywords" class="form-control" id="floatingkeywords" placeholder="Kata Kunci" maxlength="150" style="height: 100px;"><?php echo $resseo['keywords']; ?></textarea>
                    <label for="floatingkeywords">Kata Kunci</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <select name="xindex" class="form-select" id="floatingSelect" aria-label="Robots">
                      <option value="1" <?php echo $xindex; ?>>Index</option>
                      <option value="0" <?php echo $noindex; ?>>No Index</option>
                    </select>
                    <label for="floatingSelect">Robots</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <select name="xfollow" class="form-select" id="floatingSelect" aria-label="Robots">
                      <option value="1" <?php echo $xfollow; ?>>Follow</option>
                      <option value="0" <?php echo $nofollow; ?>>No Follow</option>
                    </select>
                    <label for="floatingSelect">Robots</label>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>
              <!-- End floating Labels Form -->

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