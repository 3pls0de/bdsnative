<?php

require_once("connection.php");

$query = "SELECT * FROM barang";
$result = mysqli_query($mysqli, $query);

$querytipe = "SELECT * FROM tipe_produk";
$restype = mysqli_query($mysqli, $querytipe);

require_once("session_check.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Coffee - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php require_once('css/phpcss.php'); ?>

  </head>
  <body>

    <?php require_once('komponen/headermenu.php'); ?>

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(https://images.unsplash.com/photo-1515694590185-73647ba02c10?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1470&q=80);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Our Menu</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Menu</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section" id="list-menu">
    	<div class="container">

    		<div class="mx-auto d-block text-center">
    		<h2>DAFTAR MENU KOPI RIMBA RINJANI</h2>
    		<br><br>
    		</div>

    		<?php 
    		$i = 1;
    		 ?>
    		<form method="POST" action="menu">
    			<div class="row">
    				<?php 
    				foreach ($restype as $key => $value) {
    					echo '
    					<div class="col-md-6 mb-5 pb-3">
		        	<h3 class="mb-5 heading-pricing ftco-animate">' . $value['nama_tipe'] . ' </h3>';

		        	foreach ($result as $keyval => $val) {
		        		if ($val['tipe_produk'] == $value['id_tipe']) {
		        			echo '
			        		<div class="pricing-entry d-flex ftco-animate">';
			        		if ($val['foto_produk'] != null) {
			        			echo '
			        			<div class="img" style="background-image: url(storage/' . $val['foto_produk'] . ');"></div>';
			        		} else {
			        			echo '
			        			<div class="img" style="background-image: url(https://images.unsplash.com/photo-1614350292382-c448d0110dfa?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80);"></div>';
			        		}
			        		echo '
			        			<div class="desc pl-3">
				        			<div class="d-flex text align-items-center">
				        				<h3><span>' . $val['nama_produk'] . '</span></h3>
				        				<span class="price">Rp'. $val['harga_produk'] . '/' . $val['ukuran_kemasan'] . '</span>
				        			</div>
				        			<div class="d-block">
				        				<p>' . $val['detail_komposisi'] . '</p>
				        			</div>

				        			<div class="custom-control custom-checkbox">
											  <input type="checkbox" name="ch' . $i . '" value="' . $val['nama_produk'] . '" class="custom-control-input" id="customCheck' . $i . '">
											  <label class="custom-control-label" for="customCheck' . $i . '">Beli produk ini</label>
											</div>
				        		</div>
			        		</div>';
									$i++;
		        		}
		        		
		        	}
		        	echo'
							</div>';
    				}
    				 ?>

	        </div>
	        <input type="submit" value="Hubungi Penjual" name="submit" class="btn btn-primary btn-lg mx-auto d-block ftco-animate">
    		</form>
        
    	</div>
    </section>

    <?php require_once('komponen/footer.php'); ?>
    
  

  	<?php require_once('komponen/loader.php'); ?>


  <?php require_once('js/phpjs.php'); ?>
    
  </body>
</html>