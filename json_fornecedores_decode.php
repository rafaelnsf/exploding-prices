<?php
include('conexao.php');

$json_fornecedores = '[{"razao_social":"IBM","endereco":"Armonk, NY, EUA","telefone":"+1-800-IBM-4YOU","cnpj":"12345678901","status":"A"},
{"razao_social":"Microsoft","endereco":"Redmond, WA, EUA","telefone":"+1-800-MICROSOFT","cnpj":"98765432101","status":"A"},
{"razao_social":"Nokia","endereco":"Espoo, Finlândia","telefone":"+358-10-44-88-000","cnpj":"45678901201","status":"A"}]';

$fornecedores = json_decode($json_fornecedores, true);

foreach ($fornecedores as $dados) {
    $razao_social = $dados['razao_social'];
    $endereco = $dados['endereco'];
    $telefone = $dados['telefone'];
    $cnpj = $dados['cnpj'];
    $status = $dados['status'];

    $sql = "INSERT INTO fornecedor (razao_social, endereco, telefone, cnpj, status) VALUES ('$razao_social', '$endereco', '$telefone', '$cnpj', '$status')";

    //echo $sql . "<br>";

    $query = mysqli_query($con, $sql);
}

mysqli_close($con);
?>
<a class="btn" href="listar_fornecedor.php">Voltar para lista</a>