<?php
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Exploding - Cadastrar Categoria</title>
	</head>
	<body>
		<?php
			include('menu.php');
		
			$nome     = $_POST['nome'];
			$descricao    = $_POST['descricao'];
			
			$sql = "INSERT INTO categoria VALUES (null, '{$nome}', '{$descricao}')";
			$query = mysqli_query($con, $sql);
			if(!$query) {
				echo 'Erro ao consultar o banco.' . mysqli_error($con);
			} else {
				echo 'Realizado cadastro da categoria' . mysqli_insert_id($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>