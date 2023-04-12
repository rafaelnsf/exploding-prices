<?php
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Exploding - Cadastrar Fornecedor</title>
	</head>
	<body>
		<?php
			include('menu.php');
		
			$razao_social = $_POST['razao_social'];
			$endereco     = $_POST['endereco'];
			$telefone     = $_POST['telefone'];
			$cnpj         = $_POST['cnpj'];
			
			$sql = "INSERT INTO fornecedor VALUES (null, '{$razao_social}', '{$endereco}', '{$telefone}', '{$cnpj}')";
			$query = mysqli_query($con, $sql);
			if(!$query) {
				echo 'Erro ao consultar o banco: ' . mysqli_error($con);
			} else {
				echo 'Realizado cadastro do Fornecedor.' . mysqli_insert_id($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>