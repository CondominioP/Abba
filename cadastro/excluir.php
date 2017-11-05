<!DOCTYPE html>
<?php
	$id = $_GET['Id'];
	$nome = $_GET['Nome_completo'];
	
	if(isset($_POST['Sim'])){
		$sql = "DELETE FROM usuario WHERE Id = $id";
		include "conexao.php";
		$abba = $condominio -> prepare($sql);
		$abba -> execute();
		header ("Location: lista.php");
	}
	else if(isset($_POST['Não'])){
			header ("Location: lista.php");
	}
?>
<h3>Deseja excluir <?php echo  $nome; ?>?</h3>
<form action="" method="POST">
			<input type="submit" value="Sim" name="Sim">
			<a href="lista.php"><input type="submit" value="Não" name="Não"></a>
		</form>