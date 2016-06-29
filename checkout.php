<?php
include('inc/config.php');
session_start();
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
					</ul>
				</nav>
			</div>
		</section>
		<section class="main-content">
			<div class="row">
				<div class="span12">
					<form name="finalizar" action="finalizar.php" method="post" >
						<div class="row-fluid">
							<div class="span6">
								<h4>Dados Cliente </h4>
								<div class="control-group">
									<label class="control-label">Nome</label>
									<div class="controls">
										<input type="text" required placeholder="Nome" name="nome" class="input-xlarge" <?php echo $_SESSION['id']!=='0' ? 'disabled' : ''; ?>>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Login</label>
									<div class="controls">
										<input type="text" required placeholder="login" name="login" class="input-xlarge" <?php echo $_SESSION['id']!=='0' ? 'disabled' : ''; ?>>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Senha</label>
									<div class="controls">
										<input type="password" required placeholder="senha" name="senha" class="input-xlarge" <?php echo $_SESSION['id']!=='0' ? 'disabled' : ''; ?>>
									</div>
								</div>
								<button type="submit" name="finalizar" class="btn btn-primary">Finalizar !</button>
							</div>

							<div class="span5">
								<h4>Carrinho de Compras</h4>
								<div class="block">
									<ul class="small-product">
										<?php
										$i=1;
										foreach($_SESSION as $name => $value){
											if($value > 0)
											{
												if(substr($name, 0, 5) == 'cart_')
												{
													$id = substr($name, 5, (strlen($name)-5));
													$get = mysql_query("SELECT * FROM produtos WHERE id='$id'");
													while($get_row = mysql_fetch_assoc($get)){
														$sub = $get_row['preco'] * $value;

														echo '
														<li>
														<h5>'.$i.' . &nbsp; &nbsp; &nbsp; '.$get_row['nome'].'&nbsp; &nbsp; &nbsp; '.$value.' &nbsp;  &nbsp; &nbsp; SubTotal : R$ '.$sub.'</h5>

														</li>';

														$i++;
													}
												}
												@$total += $sub;
											}
										}
										?>
										<?php echo '<h5 style="color:#F00">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Total do Pedido : '.@$total.' </h5>'; ?>
									</ul>
								</div>
							</div>

						</div>
						<input type="hidden" value="<?php echo abs((int)$_GET['total']); ?>" name="total">
					</form>
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
