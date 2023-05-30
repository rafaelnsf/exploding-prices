<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Exploding Prices - Cadastrar Fornecedor</title>
	<style type="text/css" rel="stylesheet">
		.conteudo {
			padding: 20px;
		}
	</style>
	<link rel="stylesheet" href="style_tables.css">
</head>

<body>
	<div class="conteudo">
		<?php
		include('menu.php');
		include('valida_sessao.php');
		?>
		<h1>Cadastro de Fornecedor</h1>
		<a class="btn" href="json_fornecedores_decode.php" target="_blank">CADASTRAR JSON</a>
		<form action="cadastrar_fornecedor_db.php" method="post">
			<label for="razao_social">Razão Social</label><br>
			<input type="text" name="razao_social" id="razao_social" maxlength="50"><br><br>

			<label for="endereco">Endereço</label><br>
			<input type="text" name="endereco" id="endereco" maxlength="40"><br><br>

			<label for="telefone">Telefone</label><br>
			<input type="text" name="telefone" id="telefone" maxlength="11"><br><br>

			<label for="cnpj">CNPJ</label><br>
			<input type="text" name="cnpj" id="cnpj" maxlength="14"><br><br>

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