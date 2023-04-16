<?php
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Cadastrar Cliente</title>
    <style type="text/css" rel="stylesheet">
        .conteudo {
            margin-left: 220px;
            padding: 20px;
        }
    </style>
</head>
<body>
	<div class="conteudo">
	<?php	
			$nome     = $_POST['nome'];
			$endereco = $_POST['endereco'];
			$telefone = $_POST['telefone'];
			$cpf      = $_POST['cpf'];
			$status   = $_POST['status'];
			
			$sql = "INSERT INTO cliente VALUES (null, '{$nome}', '{$endereco}', '{$telefone}', '{$cpf}', '{$status}')";
			$query = mysqli_query($con, $sql);
			if(!$query) {
				echo 'Erro ao consultar o banco. ' . mysqli_error($con);
			} else {
				echo 'Realizado cadastro do cliente. ' . mysqli_insert_id($con);
			}
	?>
	</div>
</body>
</html>
<?php
	mysqli_close($con);
?>