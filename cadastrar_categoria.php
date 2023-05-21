<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Exploding Prices - Cadastrar Categoria</title>
	<style type="text/css" rel="stylesheet">
		.conteudo {
			padding: 20px;
		}
	</style>
</head>

<body>
	<div class="conteudo">
		<?php
		include('menu.php');
		?>
		<h1>Cadastro de Categoria</h1>
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