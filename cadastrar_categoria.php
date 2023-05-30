<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Exploding Prices - Cadastrar Categoria</title>
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
		include('valida_acesso_usuario.php');
		?>
		<h1>Cadastro de Categoria</h1>
		<a class="btn" href="json_categorias_decode.php" target="_blank">CADASTRAR JSON</a>
		<form action="cadastrar_categoria_db.php" method="post">
			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" maxlength="100"><br><br>

			<label for="descricao">Descrição</label><br>
			<input type="text" name="descricao" id="descricao" maxlength="70"><br><br>

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