<?php

if(!isset($_SESSION))	session_start();
include('inc/config.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>PetShop Online</title>
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
							<li><a href="internal.php">Acesso interno</a></li>
						</ul>
					</nav>
				</div>
			<section class="main-content">
				<div class="row">
					<div class="span12">
						<?php
							  $nome = $_POST['nome'];
							  $login = $_POST['login'];
							  $senha = $_POST['senha'];
							  $total = $_POST['total'];

							  echo '<a href="index.php">Pedido faturado</a><br>';
							  echo '<p>Agradecemos sua compra '.$nome.'<br>';
							  $p = mysql_query("SELECT * FROM clientes where nome='$nome' and login='$login'and senha='$senha'");
							  $cek = mysql_fetch_array($p);
							  $c1 = $cek['nome'];
							  $c2 = $cek['login'];
							  $c3 = $cek['senha'];
								$i1 = $cek['id'];

							  if($c1 == $nome && $c2 == $login && $c3 == $senha ){//se ja existir aquele cliente vamos cadastrar a compra
									$i=1;
									foreach($_SESSION as $nome => $value){
										if($value > 0){
											if(substr($nome, 0, 5) == 'cart_'){
												$id = substr($nome, 5, (strlen($nome)-5));

												$get = mysql_query("SELECT * FROM produtos WHERE id='$id'");
												while($get_row = mysql_fetch_array($get)){
													$sub = $get_row['preco'] * $value;
													echo 'Produtos comprados';
													echo '<p>Nome:'.$get_row['nome'].' Quantidade:'.$value.' SubTotal : R$ '.$sub.'</p>';
								  				echo '<p>Total da sua compra: R$'.$total.'</p>';

													$getclientes = mysql_query("SELECT clientes.id,  produtos.id FROM clientes, produtos" ) or die(mysql_error());

													$data = mysql_fetch_array($getclientes);

													$cli = $data['id'];
													$prod = $get_row['id'];
													echo $cli;
													$i++;
												}
											}
											mysql_query("INSERT INTO compras VALUES('', '$i1', '$prod', '$value', '$sub', now()) ") or die(mysql_error());
										}
									}
							  }
							  else
							  {
								    $query = mysql_query("INSERT INTO clientes VALUES('', '$nome', '$login', '$senha')") or die(mysql_error());

									$i=1;
									foreach($_SESSION as $nome => $value){
										if($value > 0){
											if(substr($nome, 0, 5) == 'cart_'){
												$id = substr($nome, 5, (strlen($nome)-5));
												$get = mysql_query("SELECT * FROM produtos WHERE id='$id'");
												while($get_row = mysql_fetch_array($get)){
													$sub = $get_row['preco'] * $value;

													echo '<p>'.$i.' Código'.$get_row['id'].' '.$get_row['nome'].' '.$value.' SubTotal : R$ '.$sub.'</p>								';

													$getclientes = mysql_query("SELECT clientes.id, produtos.id FROM clientes, produtos " ) or die(mysql_error());

													$data = mysql_fetch_array($getclientes);

													$cli = $data['id'];
													$prod = $get_row['id'];

													$i++;
												}
											}
											mysql_query("INSERT INTO compras VALUES('', '$i1', '$prod', '$value', '$sub', now()) ") or die(mysql_error());
										}
									}
							  }
							  session_destroy();
						  ?>

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
						controlsContainer: ".flex-container"
					});
				});
			});
			</script>
			</body>
			</html>
