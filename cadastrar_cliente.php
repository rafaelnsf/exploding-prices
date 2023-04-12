<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Exploding - Cadastrar Clientes</title>
	</head>
	<body>

		<form action="cadastrar_clientes_db.php" method="post">
			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" maxlength="50"><br><br>
			
			<label for="endereco">Endereço</label><br>
			<input type="text" name="endereco" id="endereco" maxlength="100"><br><br>
			
			<label for="telefone">Telefone</label><br>
			<input type="text" name="telefone" id="telefone" maxlength="11"><br><br>
			
			<label for="cpf">CPF</label><br>
			<input type="text" name="cpf" id="cpf" maxlength="11"><br><br>
						
			<button type="submit">Cadastrar</button>
		</form>
	</body>
</html>

