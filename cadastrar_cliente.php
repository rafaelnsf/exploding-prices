<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Exploding Prices - Cadastrar Cliente</title>
	<style type="text/css" rel="stylesheet">
		.conteudo {
			padding: 20px;
		}
	</style>
</head>

<body>
	<div class="conteudo" ;>
		<?php
		include('menu.php');
		?>
		<h1>Cadastro de Cliente</h1>
		<form action="cadastrar_cliente_db.php" method="post">
			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" maxlength="50"><br><br>

			<label for="endereco">Endereço</label><br>
			<input type="text" name="endereco" id="endereco" maxlength="100"><br><br>

			<label for="telefone">Telefone</label><br>
			<input type="text" name="telefone" id="telefone" maxlength="11"><br><br>

			<label for="cpf">CPF</label><br>
			<input type="text" name="cpf" id="cpf" maxlength="11"><br><br>

			<label for="status">Status</label><br>
			<select name="status" id="status">
				<option value="A">Ativo</option>
				<option value="I">Inativo</option>
			</select><br><br>

			<button type="submit">Cadastrar</button>
		</form>
	</div>
</body>

</html>