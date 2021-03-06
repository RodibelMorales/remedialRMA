<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Framework Básico: 
		<?php if(isset($this->titulo)){ 
				echo ": ";
				echo $this->titulo; 
			} 
		?>
	</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $_layoutParams["ruta_css"]; ?>style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<header>
			<nav class="navbar navbar-default">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo APP_URL; ?>">Inicio</a></li>
					<li><a href="<?php echo APP_URL."tareas"; ?>">Tareas</a></li>
					<li><a href="<?php echo APP_URL."usuarios"; ?>">Usuarios</a></li>
					<li><a href="<?php echo APP_URL."categorias"; ?>">Categorias</a></li>
					<li><a href="<?php echo APP_URL."calendarios"; ?>">Calendarios</a></li>
					<li><a href="<?php echo APP_URL."eventos"; ?>">Eventos</a></li>
				</ul>
			</nav>
		</header>
