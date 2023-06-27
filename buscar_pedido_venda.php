<?php
include('conexao.php');

if (isset($_GET['termo'])) {
    $termo = $_GET['termo'];

    $sql = "SELECT pv.id, pv.data_pedido_venda, pv.valor_pedido, pv.id_cliente, pv.status, c.nome AS nome_cliente
            FROM pedido_venda AS pv
            INNER JOIN cliente AS c ON (pv.id_cliente = c.id)
            WHERE pv.id LIKE '%$termo%' OR c.nome LIKE '%$termo%' OR pv.data_pedido_venda LIKE '%$termo%'
            OR pv.valor_pedido LIKE '%$termo%' OR pv.status LIKE '%$termo%'";

    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $arr['id'] . '</td>';
            echo '<td>' . $arr['nome_cliente'] . '</td>';
            echo '<td>' . $arr['data_pedido_venda'] . '</td>';
            echo '<td>' . $arr['valor_pedido'] . '</td>';
            echo '<td>' . $arr['status'] . '</td>';
        }
    }
} 

mysqli_close($con);
?>