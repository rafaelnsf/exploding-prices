\<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Exploding - Cadastrar Fornecedor</title>
	</head>
	<body>
<?php
	include('menu.php');
?>
    <form action="cadastrar_fornecedor_db.php" method="post">
			<label for="razao">Razão Social</label><br>
			<input type="text" name="razao" id="razao" maxlength="50"><br><br>
			
			<label for="endereco">Endereço</label><br>
			<input type="text" name="endereco" id="endereco" maxlength="40"><br><br>
			
			<label for="telefone">Telefone</label><br>
			<input type="text" name="telefone" id="telefone" maxlength="11"><br><br>
			
			<label for="cnpj">CNPJ</label><br>
			<input type="text" name="cnpj" id="cnpj" maxlength="14"><br><br>

			<button type="submit">Cadastrar</button>
    </form>
	</body>
</html>
