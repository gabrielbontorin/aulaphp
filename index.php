<?php
    $rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $path = explode("/", $rota['path']);
    $rotasValidas = ['empresa', 'produtos', 'servicos'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Curso Trilhando Caminho com PHP">
    <meta name="author" content="Gabriel Bontorin Calbente">
	
    <title>Gabriel Bontorin Calbente</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
    <!-- CSS -->
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">
                    <h1>GABRIEL BONTORIN</h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			<ul class="nav navbar-nav">
				<li <?php if(end($path) == "") { echo 'class="active"'; } ?>><a href="./">Home</a></li>
				<li <?php if(end($path) == "empresa") { echo 'class="active"'; } ?>><a href="empresa">Empresa</a></li>
				<li <?php if(end($path) == "produtos") { echo 'class="active"'; } ?>><a href="produtos">Produtos</a></li>
				<li <?php if(end($path) == "servicos") { echo 'class="active"'; } ?>><a href="servicos">Servi&ccedil;os</a></li>
				<li><a href="#contato">Contato</a></li>
			</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <?php
        if(in_array(end($path), $rotasValidas)){
            require_once('includes/' . end($path) . '.php');
        } else if (end($path) == ""){
            require_once ('includes/home.php');
        } else {
            require_once ('includes/404.php');
        }
    ?>
    
	<!-- Section: contato -->
    <section id="contato" class="home-section text-center bg-dark">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					   <div class="section-heading">
					       <h2 style="color: #fff;">Entre em contato</h2>
        	               <i class="fa fa-2x fa-angle-down" style="color: #fff;"></i>
					   </div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">
    		<div class="row">
    			<div class="col-lg-2 col-lg-offset-5">
    				<hr class="marginbot-50">
    			</div>
    		</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="boxed-grey">
                        <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">
                                        Nome
                                    </label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required="required" />
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        E-mail
                                    </label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required="required" />
                                </div>
                                <div class="form-group">
                                    <label for="assunto">
                                        Assunto
                                    </label>
                                    <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Digite o assunto" required="required" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mensagem">
                                        Mensagem
                                    </label>
                                    <textarea name="mensagem" id="mensagem" class="form-control" rows="9" cols="25" required="required" placeholder="Mensagem"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="enviar" class="btn btn-skin pull-right">
                                    Enviar</button>
                            </div>
                        </div>
                        </form>
                        
                        <?php
                            if(isset($_POST['enviar'])){
                                extract($_POST);
                        ?>
                        <br />
                        <br />
                        
                        <div class="alert alert-success">
                            Dados enviados com sucesso, abaixo seguem os dados que voc� enviou: <br /><br />
                            
                            <b>NOME</b> <br /> <?php echo $nome; ?> <br /><br />
                            <b>E-MAIL</b> <br /> <?php echo $email; ?> <br /><br />
                            <b>ASSUNTO</b> <br /> <?php echo $assunto; ?> <br /><br />
                            <b>MENSAGEM</b> <br /> <?php echo $mensagem; ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
		</div>
	</section>
	<!-- /Section: contato -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="0.4s">
					<div class="page-scroll marginbot-30">
						<a href="#intro" id="totop" class="btn btn-circle">
							<i class="fa fa-angle-double-up animated"></i>
						</a>
					</div>
					</div>
					<p>&copy; Copyright <?php echo date("Y"); ?> - Gabriel Bontorin. Todos os direitos reservados.</p>
				</div>
			</div>	
		</div>
	</footer>

    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>

</body>

</html>
