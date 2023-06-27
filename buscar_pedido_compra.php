<?php
include('conexao.php');
include('valida_sessao.php');
include('valida_acesso_usuario.php');

if (isset($_GET['termo'])) 
    $termo = $_GET['termo'];

    $sql = "SELECT pc.id, pc.data_pedido_compra, pc.valor_compra, pc.id_fornecedor, pc.status, f.razao_social AS nome_fornecedor
            FROM pedido_compra AS pc
            INNER JOIN fornecedor AS f ON (pc.id_fornecedor = f.id)
            WHERE pc.id LIKE '%$termo%' OR f.razao_social LIKE '%$termo%' OR pc.data_pedido_compra LIKE '%$termo%' OR pc.valor_compra LIKE '%$termo%' OR pc.status LIKE '%$termo%'";

    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $arr['id'] . '</td>';
            echo '<td>' . $arr['nome_fornecedor'] . '</td>';
            echo '<td>' . $arr['data_pedido_compra'] . '</td>';
            echo '<td>' . $arr['valor_compra'] . '</td>';
            echo '<td>' . $arr['status'] . '</td>';
        }

    }

mysqli_close($con);