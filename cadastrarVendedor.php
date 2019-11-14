<?php
	include_once "connect.php";
	include_once "functions.php";
	cadastrar();
?>
<html>
<head>
	<?php include_once "template/header.php"; ?>
	<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
	<script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>
	<title>Login</title>
</head>

<body>
    <div class="logar">
    	<h2>Cadastro de Usuário</h2>
        <form class="loga" id="login" method="post" action="cadastrarVendedor.php">
            <label>Nome</label><input required="required" type="text" name="txtNome" maxlength="50" />
			<label>E-mail</label><input required="required" type="email" name="txtEmail" maxlength="50"/>
			<label>Data Nascimento</label><input required="required" type="date" name="txtDtNasc" max="<?php echo date('Y-m-d'); ?>"/>
			<label>CPF</label><input required="required" type="cpf" name="txtCPF" id="txtCPF" maxlength="14"/>
			<label>Telefone</label><input type="text" name="txtTelefone" required="required" />
			<label>Estado</label>
			<select name="txtEstado" required="required">
				<option value="">Selecione:</option>
				<?php
				$sql_estado = "	SELECT *  
                                FROM `estados`;";			
				$resultEstado = selecionar($_SG["link"], $sql_estado);		
				while($selecEstado = mysqli_fetch_assoc($resultEstado)){ ?>
				<option value="<?php echo $selecEstado['cd_estado']; ?>"><?php echo $selecEstado['ds_estado'];?></option>
				<?php } ?>
            </select>
			<label>Login</label><input required="required" type="text" name="txtUsuario" />
            <label>Senha</label><input required="required" type="password" name="txtSenha" />
            <input type="submit" name="cadastrar" value="Cadastrar!" />
        </form>
    </div>
</body>
<!-- <script type="text/javascript">
	$(document).ready(function(){
		$("#txtCPF").mask("999.999.999-99");
	});
</script> -->
</html>
