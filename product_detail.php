<?php

if(!isset($_SESSION))	session_start();

include('inc/config.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Detalhes do Produto</title>
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
			<section class="header_text sub">
				<h4><span>Detalhes do Produto</span></h4>
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span10">
						<div class="row">
                        <?php
						  $id = $_GET['id'];

						  $query = mysql_query("SELECT * FROM produtos WHERE id LIKE '$id'") ;
						  if($query === FALSE) {
                            die(mysql_error()); // TODO: better error handling
                              }

						  $data = mysql_fetch_array($query);
						?>
							<div class="span4">
								<?php echo '<a href="admin/'.$data['imagem'].'" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="admin/'.$data['imagem'].'"></a>'; ?>
							</div>
							<div class="span5">
								<address>
									<?php echo '<strong>Nome : </strong> <span> '.$data['nome'].' </span><br>
									<strong>Código : </strong> <span> '.$data['id'].' </span><br>
									'; ?>
								</address>
								<?php echo '<h4><strong>R$ '.$data['preco'].'</strong></h4>'; ?>
							</div>
							<div class="span5">
                  <?php echo '<a class="btn btn-success" href="carrinho.php?id='.$data['id'].'" class="category"><h4>Colocar no carrinho</h4></a>'; ?>
							</div>

							<div class="span5">
								  <?php
										if ($_SESSION['tipo'] == 1 or $_SESSION['tipo'] == 2){
                	echo '<a class="btn btn-warning" href="editproduct.php?id='.$data['id'].'" class="category"><h4>Editar</h4></a>';
							}
							 ?>
													</div>
						</div>
                        <br>

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
