<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Exploding Prices - Cadastrar Fornecedor</title>
	<style type="text/css" rel="stylesheet">
		.conteudo {
			padding: 20px;
		}
	</style>
</head>

<body>
	<div class="conteudo">
		<?php
		include('menu.php');


		$razao_social = $_POST['razao_social'];
		$endereco     = $_POST['endereco'];
		$telefone     = $_POST['telefone'];
		$cnpj         = $_POST['cnpj'];
		$status       = $_POST['status'];

		$sql = "INSERT INTO fornecedor VALUES (null, '{$razao_social}', '{$endereco}', '{$telefone}', '{$cnpj}', '{$status}')";
		$query = mysqli_query($con, $sql);
		if (!$query) {
			echo 'Erro ao consultar o banco: ' . mysqli_error($con);
		} else {
			echo 'Realizado cadastro do Fornecedor.' . mysqli_insert_id($con);
		}
		?>
	</div>
</body>

</html>
<?php
mysqli_close($con);
?>