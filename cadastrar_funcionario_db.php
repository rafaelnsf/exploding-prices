<?php
	include('conexao.php');
		
			$nome     = $_POST['nome'];
			$cargo    = $_POST['cargo'];
			$salario  = $_POST['salario'];
			$telefone = $_POST['telefone'];
			$endereco = $_POST['endereco'];
			$status   = $_POST['status'];
			
			$sql = "INSERT INTO funcionario VALUES (null, '{$nome}', '{$cargo}', '{$salario}', '{$telefone}', '{$endereco}', '{$status}')";
			$query = mysqli_query($con, $sql);
			if(!$query) {
				echo 'Erro ao consultar o banco.' . mysqli_error($con);
			} else {
				echo 'Realizado cadastro do funcionário' . mysqli_insert_id($con);
			}

	mysqli_close($con);
?>