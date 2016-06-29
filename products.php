<?php
session_start();
include('inc/config.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Produtos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>

		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="themes/js/superfish.js"></script>
		<script src="themes/js/jquery.scrolltotop.js"></script>

	</head>
    <body>
			<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">
					<a href="index.php" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="index.php">Início</a></li>
							<li><a href="products.php">Produtos</a>
								<ul>
									<li><a href="products.php">Produtos</a></li>
								</ul>
							</li>
							<li><a href="about.php">A loja</a></li>
							<li><a href="contact.php">Contato</a></li>
						</ul>
					</nav>
				</div>
			</section>
			<section class="main-content">

				<div class="row">
					<div class="span12">
						<ul class="thumbnails listing-products">
									<?php
										$per_page = 12;

										$page_query = mysql_query("SELECT COUNT(*) FROM produtos");
										$pages = ceil(mysql_result($page_query, 0) / $per_page);

										$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
										$start = ($page - 1) * $per_page;

										$query = mysql_query("SELECT * FROM produtos LIMIT $start, $per_page");

										while ($data = mysql_fetch_assoc($query)):
									?>
										<li class="span3">
											<div class="product-box">
												<span class="sale_tag"></span>
												<?php echo '<p><a href="product_detail.php?id='.$data['id'].'"><img src="admin/'.$data['imagem'].'" /></a></p>'; ?>
												<?php echo '<a href="product_detail.php?id='.$data['id'].'" class="title">'.$data['nome'].'</a>'; ?>
												<br/>

												<p class="price"><?php echo 'R$ '.$data['preco']; ?></p>
											</div>
										</li>
									<?php endwhile; ?>
						</ul>
						<hr>
						<div class="pagination pagination-small pagination-centered">
							<ul>
                            <?php
								if($pages >= 1 && $page <= $pages)
								{
								  for($x=1; $x<=$pages; $x++)
								  {
									  //echo ($x == $page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ' : '<a href="?page='.$x.'">'.$x.'</a> ';
									if($x == $page)
										echo ' <li class="active"><a href="?page='.$x.'">'.$x.'</a></li>';
									else
										echo ' <li><a href="?page='.$x.'">'.$x.'</a></li>';
								  }
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Institucional</h4>
						<ul class="nav">
							<li><a href="index.php">Início</a></li>
							<li><a href="about.php">A loja</a></li>
							<li><a href="contact.php">Contato</a></li>
							<li><a href="carrinho.php">Carrinho de Compras</a></li>
						</ul>
					</div>
                    <div class="span4"></div>
					<div class="span5">
						<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
						<p>Nossa loja online de produtos para o seu pet</p>
						<br/>
						<span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
					</div>
				</div>
			</section>
			<section id="copyright">
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>
