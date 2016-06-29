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
							<div>
								<form action="verifica_usuario.php" method="post" name="" id="">
									Seja Bem-Vindo <?php echo $_SESSION['nome']; ?>
										<label>Login:<input type="text" required name="login" class="input-small"/>
										Senha:<input type="password" required name="senha" class="input-small"/>
										<input type="submit" name="Submit" value="Enviar" class="btn btn-success"/>
										<?php echo '<a class="btn btn-danger" href="logout.php?id='.$_SESSION['id'].'" class="category"><h9>Sair</h9></a>';?>
										<?php echo '<a class="btn btn-warning" href="editdados.php?id='.$_SESSION['id'].'" class="category"><h7>Editar</h7></a>';?>


										</form>
						 </div>

							<li><a href="index.php">Início</a></li>
							<li><a href="products.php">Produtos</a>
								<ul>
									<li><a href="products.php">Produtos</a></li>
								</ul>
							</li>
							<li><a href="carrinho.php">Carrinho de Compras</a></li>


						</ul>


					</nav>
				</div>
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">Últimos <strong>Vendidos</strong></span></span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
									</span>
								</h4>

								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">
                                            	<?php
													$query = mysql_query("SELECT * FROM produtos LIMIT 0,4 ");

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
										</div>

										<div class="item">
											<ul class="thumbnails">
												<?php
													$query = mysql_query("SELECT * FROM produtos LIMIT 4,4 ");

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
										</div>
									</div>
								</div>
							</div>
						</div>
						<br/>
						<div class="row feature_box">
							<div class="span4">
								<div class="service">
									<div class="responsive">
										<img src="themes/images/feature_img_2.png" alt="" />
										<h4>Atendimento <strong>Rápido</strong></h4>

									</div>
								</div>
							</div>
							<div class="span4">
								<div class="service">
									<div class="customize">
										<img src="themes/images/feature_img_1.png" alt="" />
										<h4>Frete <strong>Grátis</strong></h4>

									</div>
								</div>
							</div>
							<div class="span4">
								<div class="service">
									<div class="support">
										<img src="themes/images/feature_img_3.png" alt="" />
										<h4>Troca <strong>Grátis</strong></h4>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</section>
			<section class="our_client">
				<h4 class="title"><span class="text">Nossas Marcas</span></h4>
				<div class="row">
					<div class="span2">
						<img alt="" src="themes/images/clients/1.jpg"></a>
					</div>
					<div class="span2">
					  <img alt="" src="themes/images/clients/2.png"></a>
					</div>
					<div class="span2">
						<img alt="" src="themes/images/clients/3.png"></a>
					</div>
					<div class="span2">
						<img alt="" src="themes/images/clients/4.png"></a>
					</div>
					<div class="span2">
						<img alt="" src="themes/images/clients/5.png"></a>
					</div>
					<div class="span2">
						<img alt="" src="themes/images/clients/6.jpg"></a>
					</div>
				</div>
			</section>
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Institucional</h4>
						<ul class="nav">
							<li><a href="index.php">Início</a></li>
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
