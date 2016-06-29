<?php
include('inc/config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Selesai Pemebelian</title>
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
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>
		<div id="top-bar" class="container">

		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">
					<a href="index.php" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="index.php">Beranda</a></li>
							<li><a href="products.php">Produk</a>
								<ul>
									<li><a href="products.php">Kaos</a></li>
								</ul>
							</li>
							<li><a href="about.php">Tentang Kami</a></li>
							<li><a href="contact.php">Kontak</a></li>
						</ul>
					</nav>
				</div>
			</section>
			<section class="header_text sub">
			<img class="pageBanner" src="gambar-slide/pagebanner.jpg" alt="New products" >
				<h4><span>Check Out</span></h4>
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">
						<?php

							  $nome = $_POST['nome'];
							  $login = $_POST['login'];
							  $senha = $_POST['senha'];
							  $total = $_POST['total'];

							  echo '<a href="index.php">Início</a><br>';

							  echo 'Terima kasih Anda sudah berbelanja di Toko Online kami. Dan berikut ini adalah data yang anda masukkan.';
							  echo '<p>Total biaya untuk clientesan Produk adalah '.$total.' dan biaya bisa di kirimkan melalui Rekening Bank BCA cabang Surabaya dengan nomor rekening xxxx-xxxx-xxxx atas nome Si XXXX.</p>';
							  echo '<p>Dan produtos akan kami kirim ke endereco di bawah ini:</p>';
							  echo '<p>nome : '.$nome.'<br>';
							  echo '<p>endereco Lengkap : '.$login.'</p>';
			  				  echo '<p>Total Belanja Anda : '.$total.'</p>';
							  echo '<p>Dengan Rincian : </p>';

							  $p = mysql_query("SELECT * FROM clientes");
							  $cek = mysql_fetch_array($p);
							  $c1 = $cek['nome'];
							  $c2 = $cek['login'];
							  $c3 = $cek['senha'];

							  if($c1 == $nome && $c2 == $login && $c3 == $senha)
							  {
									$i=1;
									foreach($_SESSION as $name => $value)
									{
										if($value > 0)
										{
											if(substr($name, 0, 5) == 'cart_')
											{
												$id = substr($name, 5, (strlen($name)-5));
												$get = mysql_query("SELECT * FROM produtos WHERE id='$id'");
												while($get_row = mysql_fetch_assoc($get)){
													$sub = $get_row['preco'] * $value;

													echo '<p>'.$i.' '.$get_row['id'].' '.$get_row['nome'].' '.$value.' SubTotal : R$ '.$sub.'</p>								';

													$getclientes = mysql_query("SELECT clientes.id, clientes.nome, clientes.login, produtos.id, produtos.nome FROM clientes, produtos WHERE nome='$nome' AND login='login'" ) or die(mysql_error());

													$data = mysql_fetch_array($getclientes);

													$cli = $data['id'];
													$nc = $data['nome'];
													$log = $data['login'];
													$ip = $get_row['id'];
													$np = $get_row['nome'];

													//echo $total;
													$i++;
												}
											}
											//@$total += $sub;
											mysql_query("INSERT INTO compras VALUES('', '$cli', '$ip', '$qt', '$sub', now()) ") or die(mysql_error());
										}
									}
							  }
							  else
							  {
   								    //Insert Data clientes ke Database
								    $query = mysql_query("INSERT INTO clientes VALUES('', '$nome', '$login', '$senha')") or die(mysql_error());

									$i=1;
									foreach($_SESSION as $name => $value)
									{
										if($value > 0)
										{
											if(substr($name, 0, 5) == 'cart_')
											{
												$id = substr($name, 5, (strlen($name)-5));
												$get = mysql_query("SELECT * FROM produtos WHERE id='$id'");
												while($get_row = mysql_fetch_assoc($get)){
													$sub = $get_row['preco'] * $value;

													echo '<p>'.$i.' '.$get_row['id'].' '.$get_row['nome'].' '.$value.' SubTotal : R$ '.$sub.'</p>								';

													$getclientes = mysql_query("SELECT clientes.id, clientes.nome, clientes.login, produtos.id, produtos.nome FROM clientes, produtos WHERE id='$id'" ) or die(mysql_error());

													$data = mysql_fetch_array($getclientes);

													$idcli = $data['id'];
													$na = $data['nome'];
													$al = $data['login'];
													$idprod = $get_row['id'];
													$nb = $get_row['nome'];

													//echo $total;
													$i++;
												}
											}
											//@$total += $sub;
											mysql_query("INSERT INTO compras VALUES('', '$idcli', '$idprod', '$value', '$sub', now()) ") or die(mysql_error());
										}
									}
							  }



							  /*if ($query)
							  {
								  header('location:index.php');
							  }*/

							  session_destroy();
						  ?>

					</div>
				</div>
			</section>
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="index.php">Beranda</a></li>
							<li><a href="about.php">Tentang Kami</a></li>
							<li><a href="contact.php">Kontak</a></li>
							<li><a href="keranjang.php">Keranjang Belanja</a></li>
						</ul>
					</div>
                    <div class="span4"></div>
					<div class="span5">
						<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
						<p>Toko online kami menjual beberapa kaos</p>
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
    </body>
</html>
