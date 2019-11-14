<?php include_once "connect.php";
	logar();
?>
<html>
<head>
<?php include_once "template/header.php"; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
    <div class="logar">
    	<h2>Painel de controle</h2>
        <form id="login" method="post" action="login.php">
            <label>Usuario</label><input required="required" type="text" name="usuario" /><br />
            <label>Senha</label><input required="required" type="password" name="senha" /><br />
            <input type="submit" name="logar" value="Entrar!" />
			<a href="cadastrarVendedor.php"><input type="button" name="cadastrar" value="Cadastre-se!" /></a>
        </form>
    </div>
</body>
</html>