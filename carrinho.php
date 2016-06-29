<?php
include('inc/config.php');

if(!isset($_SESSION))	session_start();

//Tambah produtos//
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$qt = mysql_query("SELECT id FROM produtos WHERE id='$id'");
//	while($qt_row = mysql_fetch_assoc($qt)){
	//	if($qt_row['jml_brg'] != $_SESSION['cart_'.$_GET['id']] && $qt_row['jml_brg'] > 0){
			$_SESSION['cart_'.$_GET['id']]+='1';
			header("Location: carrinho.php");
	/*	} else {
			echo '<script language="javascript">alert("Stok produk tidak mencukupi!"); document.location="index.php";</script>';
		}
	}*/
}

//Hapus 1 produtos//
if(isset($_GET['remove'])){
	$_SESSION['cart_'.$_GET['remove']]--;
	header("Location: carrinho.php");
}

//Hapus produtos//
if(isset($_GET['delete'])){
	$_SESSION['cart_'.$_GET['delete']]='0';
	header("Location: carrinho.php");
}
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
						</ul>
					</nav>
				</div>
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">
						<h4 class="title"><span class="text"><strong>Carrinho de </strong> Compras</span></h4>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Nº</th>
									<th>Produto</th>
									<th>Descrição</th>
									<th>Quantidade</th>
									<th>Preço</th>
									<th>Total</th>
                                    <th>Opsi</th>
								</tr>
							</thead>
							<tbody>

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
												$idprodutos = $get_row['id'];
												echo '
												<tr>
												<td>'.$i.'</td>
												<td><img alt="" src="admin/'.$get_row['imagem'].'" width="100" height="200" ></td>
												<td>'.$get_row['nome'].'</td>
												<td>'.$value.'</td>
												<td>'.$get_row['preco'].'</td>
												<td>'.$sub.'</td>
												<td>
													<a href="carrinho.php?remove='.$id.'"><i class="icon-minus"></i></a> |
													<a href="carrinho.php?id='.$id.'"><i class="icon-plus"></i></a> |
													<a href="carrinho.php?delete='.$id.'"><i class="icon-remove"></i></a>
												</td>
												<br>
												</tr>';
												$i++;
											}
										}
										@$total += $sub;
									}
								}
								/*
								if(@$total == 0){
									echo 'carrinho Belanja Kosong!';
									echo '<br>
											<a href="index.php">Kembali Belanja</a>
										  </br>
										  <br>';
								} else {
									echo '<a href="detail.php">&raquo; Detail &laquo;</a>';
									echo '<strong>Total Belanja</strong>: '.@$total.'<br>';
								}
								*/
								?>

							</tbody>
						</table>

						<p class="cart-total right">
							<?php //echo '<strong>Total Belanja</strong>: '.@$total.'<br>'; ?>
						</p>
						<hr/>
						<p class="buttons center">
                        <?php
							if(@$total == 0){
									echo 'carrinho Belanja Kosong!';
									echo '<br>
											<a href="index.php">Início</a>

										  </br>
										  <br>';
								} else {
									//echo '<div style="text-align:right; font-size:11px;"><a href="detail.php">&raquo; Detail &laquo;</a></div>';
									echo '<strong>Total Pedido</strong>: '.@$total.'<br>';
									echo '<a href="index.php" class="btn" type="button">Continuar Comprando</a> ';
									echo '<a href="checkout.php?total='.$total.'" class="btn btn-inverse" type="submit">Finalizar Pedido</a>';
								}
						?>
							<!--<a href="index.php" class="btn" type="button">Kembali Belanja</a>
							<a href="<?php echo 'checkout.php?total='.$total.''; ?>" class="btn btn-inverse" type="submit">Checkout</a>
						--></p>
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
