<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo isset($desc) ? $desc : "";?>">
	<meta name="author" content="CPM-WEB">
	<link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

	<title>
		<?php
		echo isset($title) ? $title : "Titre";
		?>
	</title>

	<!-- Bootstrap core CSS -->
	<link href="/css/bootstrap.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="/css/signin.css" rel="stylesheet">
	
	<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
	<script>
	tinymce.init({
		selector: "textarea#contenu",
	    theme: "modern",
	    height: 500,
		content_css: "/assets/css/style.css",
		plugins: "code",
		extended_valid_elements: "hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style],img[href|src|name|title|onclick|align|alt|title|width|height|vspace|hspace],iframe[id|class|width|size|noshade|src|height|frameborder|border|marginwidth|marginheight|target|scrolling|allowtransparency],style[type]"
	 }); 
	</script>

	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		
	<style>
		body { padding-top: 70px; }
	</style>	
</head>
<body>
	<div class="container">

		<!-- Static navbar -->
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">Spa</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="<?php echo isset($class_accueil) ? $class_accueil : "" ;?>"><a href="/">Accueil</a></li>
						<li class="<?php echo isset($class_spa) ? $class_spa : "" ;?>"><a href="/le-spa">Le spa</a></li>
						<li class="<?php echo isset($class_service) ? $class_service : "" ;?>"><a href="/les-services">Les services</a></li>
						<li class="<?php echo isset($class_produit) ? $class_produit : "" ;?>"><a href="/produits">Produits</a></li>
						<li class="<?php echo isset($class_contact) ? $class_contact : "" ;?>"><a href="/contact">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
						if($user->isAuthenticated())
						{
							?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle <?php echo $class_cours;?>" data-toggle="dropdown">Mon profil <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/membre">Voir mon profil</a></li>
								<li><a href="/connexion/logout//">Deconnexion</a></li>
							</ul>
						</li>	
							<?php
						}
						else
						{
							?>
						<li class=""><a href="/connexion">Se connecter</a></li>	
							<?php
						}
						?>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
		
		<?php
		echo $content;
		?>

	</div> <!-- /container -->
	
	<!--=== Includes modal ===-->
	<?php
	if (isset($includes)) {
		foreach ($includes as $include) {
			//echo '<pre>'.$include."</pre>";
			include $include;
		}
	}
	?>
	<!--===  End Includes modal ===-->

	<!-- Bootstrap core JavaScript ================ -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="/js/jquery-1.7.2.min.js"></script>
	<script src="/js/jquery.uniform.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/holder.js"></script>
	<script src='/js/custom.js'></script>
	
	<!--=== JavaScript insert code ===-->
	<?php
	if (isset($js)) {
		foreach ($js as $javascript) {
			echo $javascript;
		}
	}
	if ($user->hasFlash()) echo $user->getFlash();?>
	<!--===  End JavaScript insert code ===-->
</body>
</html>
