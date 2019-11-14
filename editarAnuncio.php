<?php 
	include_once "connect.php";
	include_once "functions.php";
	atualizarAnuncio();
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
		<h2>Editar Anúncio</h2>
		<?php 
                if((isset($_GET["acao"])) AND ($_GET["acao"] == "atualizar") AND (isset($_GET["id"])))
                {
					$sqlBuscaMeuAnuncioSelect = "SELECT * FROM anuncios
													INNER JOIN marcas
													ON anuncios.cd_marca = marcas.cd_marca
													INNER JOIN cores
													ON anuncios.cd_cor = cores.cd_cor
													INNER JOIN vendedores
													ON anuncios.cd_vendedor = vendedores.cd_vendedor		
													WHERE anuncios.cd_anuncio =".$_GET['id']." LIMIT 1";
                    $Anuncio = selecionar($_SG["link"], $sqlBuscaMeuAnuncioSelect);
					while($selectAnuncio = mysqli_fetch_assoc($Anuncio))
					{?>	
						<form class="anuncio" method="post" action="editarAnuncio.php">
							<label>Título do Anúncio</label>
							<input type="text" required name="tituloAnuncio" placeholder="Digite o Título do Anúncio" value="<?php echo $selectAnuncio['ds_anuncio']; ?>">
							<label>Marca do carro</label>
							<select name="marcaCarro">
								<option value="<?php echo $selectAnuncio['cd_marca']; ?>"><?php echo $selectAnuncio['ds_marca']; ?></option>
								<?php 
								$sql_marca = "	SELECT *  
												FROM `marcas`;";			
								$resultMarca = selecionar($_SG["link"], $sql_marca);		
								while($selecMarca = mysqli_fetch_assoc($resultMarca)){ ?>
								<option value="<?php echo $selecMarca['cd_marca']; ?>"><?php echo $selecMarca['ds_marca'];?></option>
								<?php } ?>
							</select>
							<label>Modelo do carro</label>
							<input type="text" name="modeloCarro" placeholder="Digite o Modelo do Carro" value="<?php echo $selectAnuncio['ds_modelo']; ?>">
							<label>Cor do carro</label>	
							<select name="corCarro">
								<option value="<?php echo $selectAnuncio['cd_cor']; ?>"><?php echo $selectAnuncio['ds_cor']; ?></option>
								<?php
								$sql_cor = "	SELECT *  
												FROM `cores`;";			
								$resultCor = selecionar($_SG["link"], $sql_cor);		
								while($selecCor = mysqli_fetch_assoc($resultCor)){ ?>
								<option value="<?php echo $selecCor['cd_cor']; ?>"><?php echo $selecCor['ds_cor'];?></option>
								<?php } ?>
							</select>
							<label>Ano do carro</label>
							<input type="text" placeholder="YYYY" pattern="([0-9]{4})" maxlength="4" name="anoCarro" value="<?php echo $selectAnuncio['dt_ano']; ?>">
							<label>Preço do carro</label>
							<input type="text" placeholder="Preço" maxlength="20" name="precoCarro" value="<?php echo $selectAnuncio['ds_preco']; ?>">
							<label>Descrição do Anúncio</label>
							<textarea type="text" name="descricaoAnuncio"><?php echo $selectAnuncio['ds_descricao_anuncio']; ?></textarea>
							<input type="hidden" name="cdAnuncio" value="<?php echo $selectAnuncio['cd_anuncio']; ?>" />
							<input type="submit" name="atualizarAnuncio" value="Salvar!">
						</form>
					<?php 
					}?>
				<?php 
				}?>
	</div>
  
 
  </body>
</html>