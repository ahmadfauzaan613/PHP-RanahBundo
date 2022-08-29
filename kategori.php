<?php
session_start();
include 'dbconnect.php';

$idk = $_GET['idkategori'];
?>
<!DOCTYPE html>
<html>
<head>
<title>RANAH BUNDO - Kategori</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tokopekita, Richard's Lab" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<script src="https://cdn.tailwindcss.com"></script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- //navigation -->
<div class="bg-[#000] flex items-center justify-between px-[40px]">
<div class="py-[10px]">
	<a href="index.php">
	<img src="images/logo.png" alt="" class="w-[70%]">
	</a>
</div>
<div>
<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="index.php" class="text-white font-[400] text-[16px]">Home</a></li>	
									<!-- Mega Menu -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle text-white font-[400] text-[16px]" data-toggle="dropdown">Kategori Produk<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-1 px-[25px]">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<?php 
														$kat=mysqli_query($conn,"SELECT * from kategori order by idkategori ASC");
														while($p=mysqli_fetch_array($kat)){

															?>
														<li><a href="kategori.php?idkategori=<?php echo $p['idkategori'] ?>"><?php echo $p['namakategori'] ?></a></li>
																				
														<?php
																	}
														?>
													</ul>
												</div>	
												
											</div>
										</ul>
									</li>
									<li><a href="cart.php"  class="text-white font-[400] text-[16px]">Keranjang Saya</a></li>
									<li><a href="daftarorder.php"  class="text-white font-[400] text-[16px]">Daftar Order</a></li>
								</ul>
							</div>
</div>
<div class="flex items-center space-x-5">
<?php
				if(!isset($_SESSION['log'])){
					echo '
					<a href="registered.php" class="text-white font-[700]"> Daftar</a>
					<a href="login.php" class="text-white font-[700]">Masuk</a>
					';
				} else {
					
					if($_SESSION['role']=='Member'){
					echo '
					<p class="text-white font-[700]">Halo, '.$_SESSION["name"].'
					<a class="text-white font-[700]" href="logout.php">Keluar?</a>
					';
					} else {
					echo '
					<p class="text-white font-[700]">Halo, '.$_SESSION["name"].'
					<a class="text-white font-[700]" href="admin">Admin Panel</a>
					<a class="text-white font-[700]" href="logout.php">Keluar?</a>
					';
					};
					
				}
				?>
	<div class="product_list_header">  
		<a href="cart.php">
		<button class="w3view-cart" type="submit" name="submit" value="">
		<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
		</button>
		</a>
	</div>	
</div>
</div>
<!-- //navigation -->	
<!--- beverages --->
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Categories</h2>
					<ul class="cate">
						
						
						<?php 
														$kat=mysqli_query($conn,"SELECT * from kategori order by idkategori ASC");
														while($p=mysqli_fetch_array($kat)){

															?>
														<li><a href="kategori.php?idkategori=<?php echo $p['idkategori'] ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><?php echo $p['namakategori'] ?></a></li>
																				
														<?php
																	}
														?>
							
					</ul>
				</div>																																												
			</div>
			<div class="col-md-8 products-right">
				<div class="agile_top_brands_grids">
				
				
				<?php 
					$brgs=mysqli_query($conn,"SELECT * from produk where idkategori='$idk' order by idproduk ASC");
					$x = mysqli_num_rows($brgs);
					
					if($x>0){
					while($p=mysqli_fetch_array($brgs)){
					?>
						
						<div class="col-md-4 top_brand_left">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<!-- <div class="agile_top_brand_left_grid_pos">
									<img src="images/offer.png" alt=" " class="img-responsive" />
								</div> -->
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="product.php?idproduk=<?php echo $p['idproduk'] ?>"><img src="<?php echo $p['gambar']?>" width="200px" height="200px"></a>		
												<p><?php echo $p['namaproduk'] ?></p>
												<h4>Rp<?php echo number_format($p['hargaafter']) ?> <span>Rp<?php echo number_format($p['hargabefore']) ?></span></h4>
											</div>
											<div class="snipcart-details top_brand_home_details">
												<fieldset>
													<a href="product.php?idproduk=<?php echo $p['idproduk'] ?>"><input type="submit" class="button" value="Lihat Produk" /></a>
												</fieldset>
											</div>
										</div>
									</figure>
								</div>
							</div>
						</div>
					</div>
						<?php
							}
					} else {
						echo "Data tidak ditemukan";
					}
						?>
					
						<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!--- beverages --->
<!-- //footer -->
<div class="bg-black h-[70%] py-4 flex items-center justify-between">
    <div class="flex-col space-y-4">
    	<div class="px-[20%] flex items-center space-x-3">     
    <img src="images/placeholder.png" alt="" class="w-[3%]">
    <p class="text-white">Pasar Induk kramat jati jl.karya los CSB NO 182-184</p>
    </div>
    <div class="px-[20%] flex items-center space-x-3">     
    <img src="images/telephone-call.png" alt="" class="w-[3%]">
    <p class="text-white">081284948231</p>
 
    </div>
	<div class="px-[20%] flex items-center space-x-3">     
    <img src="images/gmail.png" alt="" class="w-[3%]">
    <p class="text-white">ranahbundo@gmail.com</p>
 
    </div>
    </div>
<img src="images/logo.png" alt="" class="w-[13%] px-[40px]">
</div>			
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 4000,
				easingType: 'linear' 
				};
			
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<!-- //main slider-banner --> 
</body>
</html>