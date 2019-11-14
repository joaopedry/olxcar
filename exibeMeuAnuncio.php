<?php 
	include_once "connect.php";
	include_once "functions.php";
	protegePagina();
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
		<h2>Meus Anúncios</h2>
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
			$sqlBuscaMeuAnuncioSelect = "SELECT * FROM anuncios
											INNER JOIN marcas
											ON anuncios.cd_marca = marcas.cd_marca
											INNER JOIN cores
											ON anuncios.cd_cor = cores.cd_cor
											INNER JOIN vendedores
											ON anuncios.cd_vendedor = vendedores.cd_vendedor		
											WHERE anuncios.cd_vendedor = '".$_SESSION['usuarioID']."'";
			$resultMeuAnuncio = selecionar($_SG["link"], $sqlBuscaMeuAnuncioSelect);		
			while($selecAnuncio = mysqli_fetch_assoc($resultMeuAnuncio)){
			?>
			<tbody>
				<tr>
					<td><?php echo $selecAnuncio['ds_anuncio']; ?></td>
					<td><?php echo $selecAnuncio['ds_modelo']; ?></td>
					<td><?php echo $selecAnuncio['ds_marca']; ?></td>
					<td><?php echo $selecAnuncio['ds_cor']; ?></td>
					<td><?php echo $selecAnuncio['dt_ano']; ?></td>
					<td>
						<div class="botao">
                        	<a class="btnEdita" href="editarAnuncio.php?acao=atualizar&id=<?php echo $selecAnuncio['cd_anuncio']; ?>">Editar</a>
						</div>
							<form action="query.php" method="post">
                                <input type="hidden" name="codigoAnuncio" value="<?php echo $selecAnuncio['cd_anuncio']; ?>"/>
                                <button class="btnDelete" type="submit" name="deletarAnuncio">Deletar</button>
							</form>
                    </td>
				</tr>
			<?php }
			?>	
			</tbody>
		</table>
	</div>
  
 
  </body>
</html>