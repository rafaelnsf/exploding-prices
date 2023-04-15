<?php
	include('conexao.php');
		
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

	mysqli_close($con);
?>