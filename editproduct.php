<?php
include('inc/config.php');
if(!isset($_SESSION))	session_start();


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
		<section class="main-content">
			<div class="row">
				<div class="span12">
					<h4 class="title"><span class="text"><strong>Dados do </strong> Produto</span></h4>

					<?php
					$id=$_GET['id'];

					$result = mysql_query("SELECT * FROM produtos WHERE id='$id'");

					while($row = mysql_fetch_array($result)){
						$nome = $row['nome'];
						$imagem = $row['imagem'];
						$preco = $row['preco'];
					}
					if(isset($_POST['deletar'])) {
						$sqldrop = mysql_query("DELETE from produtos WHERE id = '$id'");
						$drop = mysql_query( $sqldrop);
						if($drop ) {
							die('Não foi possivel deletar os dados: ' . mysql_error());
						}
						echo "Dados deletados com sucesso!\n";
					}
					if(isset($_POST['update'])) {
						$nome = $_POST['nome'];
						$preco = $_POST['preco'];
						$imagem = $_POST['imagem'];
						$sql = mysql_query("UPDATE produtos SET imagem = '$imagem', nome = '$nome', preco = '$preco' WHERE id = '$id'");

						$retval = mysql_query( $sql);


						if($retval ) {
							die('Não foi possivel atualizar os dados: ' . mysql_error());
						}
						echo "Dados atualizados com sucesso!\n";

					}else {
						?>

						<form method = "post" action = "<?php $_SERVER["PHP_SELF"] ?>">
							<div class="control-group">
								<label class="control-label">Nome</label>
								<div class="controls">
									<input type="text" required name="nome" value="<?php echo $nome; ?>" class="input-xlarge" <?php echo $_SESSION['tipo']=='2' ? 'disabled' : ''; ?>/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Preço</label>
								<div class="controls">
									<input type="text" required name="preco" value="<?php echo $preco; ?>" class="input-xlarge" >
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Imagem</label>
								<div class="controls">
											<input type="text" required name="imagem" value="<?php echo $imagem; ?>" class="input-xlarge" >

								</div>
							</div>
							<input type="hidden" name="editar_usuario" value="cad" />

							<button type="submit" name="update" class="btn btn-success">Salvar </button>
							<button type="submit" name="deletar" class="btn btn-danger">Excluir </button>
							<button type="submit" name="cancelar" onClick=" window.history.back(); "class="btn btn-warning">Cancelar</button>

							<?php
						}
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
							<li><a href="editproduct.php">Carrinho de Compras</a></li>
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
