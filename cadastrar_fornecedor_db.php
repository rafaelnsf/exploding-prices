<?php
	include('conexao.php');
		
			$razao_social = $_POST['razao_social'];
			$endereco     = $_POST['endereco'];
			$telefone     = $_POST['telefone'];
			$cnpj         = $_POST['cnpj'];
			$status       = $_POST['status'];
			
			$sql = "INSERT INTO fornecedor VALUES (null, '{$razao_social}', '{$endereco}', '{$telefone}', '{$cnpj}', '{$status}')";
			$query = mysqli_query($con, $sql);
			if(!$query) {
				echo 'Erro ao consultar o banco: ' . mysqli_error($con);
			} else {
				echo 'Realizado cadastro do Fornecedor.' . mysqli_insert_id($con);
			}

	mysqli_close($con);
?>