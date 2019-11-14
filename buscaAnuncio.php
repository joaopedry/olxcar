<?php 
	include_once "connect.php";
	include_once "functions.php";
	protegePagina();
?>
<html>
  <head>
    <title class="title">OLXCar</title>
    <link rel="stylesheet" href="css/style.css">
	<?php include_once "template/header.php"; ?>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <header style="height:6%;">
  
  </header>
  <body>
	<?php include_once "template/lateral.php"; ?>
	<div class="anunciar">
		<h2>Anúncios</h2>
		<table class="meusPedidos">
		<thead>
			<tr>
				<th>Título</th>
				<th>Modelo</th>
				<th>Marca</th>
				<th>Cor</th>
				<th>Ano</th>
			</tr>
		</thead>
		<?php
		if(isset($_POST['buscaAnuncio']))
		{
			$nomeAnuncio = $_POST['nomeAnuncio'];
			$sqlPesquisaAnuncioSelect = "SELECT * FROM anuncios
											INNER JOIN marcas
											ON anuncios.cd_marca = marcas.cd_marca
											INNER JOIN cores
											ON anuncios.cd_cor = cores.cd_cor
											INNER JOIN vendedores
											ON anuncios.cd_vendedor = vendedores.cd_vendedor		
											WHERE anuncios.ds_anuncio like '%".$nomeAnuncio."%'";
			$resultAnuncio = selecionar($_SG["link"], $sqlPesquisaAnuncioSelect);		
			while($selecAnuncio = mysqli_fetch_assoc($resultAnuncio)){
			?>
				<tbody>
					<tr>
						<td><?php echo $selecAnuncio['ds_anuncio']; ?></td>
						<td><?php echo $selecAnuncio['ds_modelo']; ?></td>
						<td><?php echo $selecAnuncio['ds_marca']; ?></td>
						<td><?php echo $selecAnuncio['ds_cor']; ?></td>
						<td><?php echo $selecAnuncio['dt_ano']; ?></td>
						<td>
							<button type="button" class="btnVisualiza" data-toggle="modal" data-target="#myModal<?php echo $selecAnuncio['cd_anuncio']; ?>">Visualizar</button>
						</td>
					</tr>
				</tbody>
				<div class="modal fade" id="myModal<?php echo $selecAnuncio['cd_anuncio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title text-center" id="myModalLabel"><?php echo $selecAnuncio['ds_anuncio']; ?></h4>
							</div>
							<div class="modal-body">
								<p>Modelo: <?php echo $selecAnuncio['ds_modelo']; ?></p>
								<p>Marca: <?php echo $selecAnuncio['ds_marca']; ?></p>
								<p>Cor: <?php echo $selecAnuncio['ds_cor']; ?></p>
								<p>Ano: <?php echo $selecAnuncio['dt_ano']; ?></p>
								<p>Preço: <?php echo $selecAnuncio['ds_preco']; ?></p>
								<p>Nome Vendedor: <?php echo $selecAnuncio['ds_vendedor']; ?></p>
								<p>Telefone: <?php echo $selecAnuncio['ds_telefone']; ?></p>
								<p>E-mail: <?php echo $selecAnuncio['ds_email']; ?></p>
								<p>Descrição: <?php echo $selecAnuncio['ds_descricao_anuncio']; ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php }
			?>			
		<?php }
		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		</table>
	</div>
  
 
  </body>
</html>