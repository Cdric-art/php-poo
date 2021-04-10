<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?= SCRIPT . "style/index.css" ?>">
	<title>Site PHP</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-1">
	<a class="navbar-brand m-lg-1" href="http://localhost/site_php/">Site PHP</a>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="http://localhost/site_php/">Accueil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="http://localhost/site_php/posts">Les articles</a>
			</li>
		</ul>
	</div>
</nav>
<div class="container mt-5">
    <?= $content ?>
</div>
</body>
</html>
