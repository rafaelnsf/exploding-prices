<?php
	include('conexao.php');

		
			$nome   	  = $_POST['nome'];
			$descricao    = $_POST['descricao'];
			$status       = $_POST['status'];
			
			$sql = "INSERT INTO categoria VALUES (null, '{$nome}', '{$descricao}', '{$status}')";
			$query = mysqli_query($con, $sql);
			if(!$query) {
				echo 'Erro ao consultar o banco.' . mysqli_error($con);
			} else {
				echo 'Realizado cadastro da categoria' . mysqli_insert_id($con);
			}

	mysqli_close($con);
?>