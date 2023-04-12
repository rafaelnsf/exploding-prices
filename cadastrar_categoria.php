<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Exploding - Cadastrar Categoria</title>
	</head>
	<body>

		<form action="cadastrar_categoria_db.php" method="post">
			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" maxlength="100"><br><br>
			
			<label for="descricao">Descrição</label><br>
			<input type="text" name="descricao" id="descricao" maxlength="70"><br><br>
						
			<button type="submit">Cadastrar</button>
		</form>
	</body>
</html>

