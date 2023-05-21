<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Exploding Prices - Cadastrar Funcionario</title>
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

		$nome     = $_POST['nome'];
		$cargo    = $_POST['cargo'];
		$salario  = $_POST['salario'];
		$telefone = $_POST['telefone'];
		$endereco = $_POST['endereco'];
		$status   = $_POST['status'];

		$sql = "INSERT INTO funcionario VALUES (null, '{$nome}', '{$cargo}', '{$salario}', '{$telefone}', '{$endereco}', '{$status}')";
		$query = mysqli_query($con, $sql);
		if (!$query) {
			echo 'Erro ao consultar o banco.' . mysqli_error($con);
		} else {
			echo 'Realizado cadastro do funcionário: ' . mysqli_insert_id($con);
		}
		?>
	</div>
</body>

</html>
<?php
mysqli_close($con);
?>