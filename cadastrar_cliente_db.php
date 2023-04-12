<?php
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Exploding - Cadastrar Clientes</title>
	</head>
	<body>
		<?php
			include('menu.php');
		
			$nome     = $_POST['nome'];
			$endereco = $_POST['endereco'];
			$telefone = $_POST['telefone'];
			$cpf      = $_POST['cpf'];
			
			$sql = "INSERT INTO cliente VALUES (null, '{$nome}', '{$endereco}', '{$telefone}', '{$cpf}')";
			$query = mysqli_query($con, $sql);
			if(!$query) {
				echo 'Erro ao consultar o banco. ' . mysqli_error($con);
			} else {
				echo 'Realizado cadastro do cliente. ' . mysqli_insert_id($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>