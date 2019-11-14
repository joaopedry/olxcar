<?php 
	include_once "connect.php";
	include_once "functions.php";
  protegePagina();
  buscaAnuncio();
?>
<html>
  <head>
    <title>OLXCar</title>
    <link rel="stylesheet" href="css/style.css">
    <?php include_once "template/header.php"; ?>
  </head>
  <body>
	<?php include_once "template/lateral.php"; ?>
	<div class="anunciar">
		<h2>Bem vindo ao OXLCar</h2>
    <form class="anuncio" method="post" action="buscaAnuncio.php">
    <label>Pesquisar Anúncio</label>
      <input type="text" name="nomeAnuncio">
      <input type="submit" name="buscaAnuncio" value="Buscar">
    </form>
	</div>
  
 
  </body>
</html>

