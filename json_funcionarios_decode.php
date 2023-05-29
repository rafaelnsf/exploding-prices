<?php
include('conexao.php');

$json_funcionarios = '[{"nome":"John Doe","cargo":"Desenvolvedor","salario":5000,"telefone":"(11) 1234-5678","endereco":"Rua Principal, 123","status":"A"},
{"nome":"Jane Smith","cargo":"Analista de Marketing","salario":4500,"telefone":"(22) 2345-6789","endereco":"Avenida Comercial, 456","status":"A"},
{"nome":"Michael Johnson","cargo":"Gerente de Vendas","salario":8000,"telefone":"(33) 3456-7890","endereco":"Praça Central, 789","status":"A"}]';

$funcionarios = json_decode($json_funcionarios, true);

foreach ($funcionarios as $dados) {
    $nome = $dados['nome'];
    $cargo = $dados['cargo'];
    $salario = $dados['salario'];
    $telefone = $dados['telefone'];
    $endereco = $dados['endereco'];
    $status = $dados['status'];

    $sql = "INSERT INTO funcionario (nome, cargo, salario, telefone, endereco, status) VALUES ('$nome', '$cargo', $salario, '$telefone', '$endereco', '$status')";
    //echo $sql . "<br>";

    $query = mysqli_query($con, $sql);
}

mysqli_close($con);
?>
<a class="btn" href="listar_funcionario.php" target="_blank">Voltar para lista</a>