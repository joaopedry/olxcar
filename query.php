<?php
	include_once "connect.php";
	include_once "functions.php";

if(isset($_POST['deletarAnuncio']))
{
	$codigoAnuncio = $_POST['codigoAnuncio'];
	$sql_deletarAnuncio = "DELETE FROM `anuncios` WHERE `cd_anuncio` = '".$codigoAnuncio."'";
	actionQuery($_SG['link'], $sql_deletarAnuncio);
	unset($_POST['deletarAnuncio']);
	header('location: exibeMeuAnuncio.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao deletar)';
	echo '</script>';
}
?>