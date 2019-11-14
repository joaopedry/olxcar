<?php 
	include_once "connect.php";
	include_once "functions.php";
	protegePagina();
	cadastrarCarro();
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
		<h2>Cadastrar Anúncio</h2>
		<form class="anuncio" method="post" action="cadastraAnuncio.php">
			<label>Título do Anúncio</label>
			<input type="text" name="tituloAnuncio" required placeholder="Digite o Título do Anúncio">
			<label>Marca do carro</label>
			<select name="marcaCarro" required>
				<option value="">Selecione:</option>
				<?php 
				$sql_marca = "	SELECT *  
                            	FROM `marcas`;";			
				$resultMarca = selecionar($_SG["link"], $sql_marca);		
				while($selecMarca = mysqli_fetch_assoc($resultMarca)){ ?>
				<option value="<?php echo $selecMarca['cd_marca']; ?>"><?php echo $selecMarca['ds_marca'];?></option>
				<?php } ?>
            </select>
			<label>Modelo do carro</label>
			<input type="text" name="modeloCarro" placeholder="Digite o Modelo do Carro">
			<label>Cor do carro</label>	
			<select name="corCarro">
				<option value="">Selecione:</option>
				<?php
				$sql_cor = "	SELECT *  
                                FROM `cores`;";			
				$resultCor = selecionar($_SG["link"], $sql_cor);		
				while($selecCor = mysqli_fetch_assoc($resultCor)){ ?>
				<option value="<?php echo $selecCor['cd_cor']; ?>"><?php echo $selecCor['ds_cor'];?></option>
				<?php } ?>
            </select>
			<label>Ano do carro</label>
			<input type="text" placeholder="YYYY" pattern="([0-9]{4})" maxlength="4" name="anoCarro">
			<label>Preço do carro</label>
			<input type="text" placeholder="Preço" maxlength="20" name="precoCarro">
			<label>Descrição do Anúncio</label>
			<textarea type="text" name="descricaoAnuncio"></textarea>
			<input type="submit" class="cadastrarAnuncio" name="cadastrarAnuncio" value="Cadastrar!">
		</form>
	</div>
  
 
  </body>
</html>