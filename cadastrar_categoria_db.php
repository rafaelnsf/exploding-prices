<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Exploding Prices - Cadastrar Categoria</title>
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


		$nome   	  = $_POST['nome'];
		$descricao    = $_POST['descricao'];
		$status       = $_POST['status'];

		$sql = "INSERT INTO categoria VALUES (null, '{$nome}', '{$descricao}', '{$status}')";
		$query = mysqli_query($con, $sql);
		if (!$query) {
			echo 'Erro ao consultar o banco.' . mysqli_error($con);
		} else {
			echo 'Realizado cadastro da categoria' . mysqli_insert_id($con);
		}
		?>
	</div>
</body>

</html>
<?php
mysqli_close($con);
?>