<html>

<head>
    <title>Sistema de Pedidos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="./css/styles.css" />

<body>
    <h1>Sistema de Pedidos</h1>
    <h2>Seu pedido foi processado</h2>
    <?php
    $tireqty = $_POST['tireqty'];
    $oilqty = $_POST['oilqty'];
    $sparkqty = $_POST['sparkqty'];
    echo '<div class="pedidoCard">';

    echo '<p>Ordem processada às ';
    echo date('H:i, jS M Y');
    echo '</p>';
    echo '<p>Seu pedido é como segue: </p>';
    echo '<p>';
    echo htmlspecialchars($tireqty) . ' pneus<br />';
    echo htmlspecialchars($oilqty) . ' litros de óleo<br />';
    echo htmlspecialchars($sparkqty) . ' velas de ignição<br />';
    echo '</p>';
    echo '</div>';
    echo '<p>Resumo do pedido <br />';
    $totalqty = 0;
    $totalqty = $tireqty + $oilqty + $sparkqty;
    echo '<details>Items do pedido: ' . $totalqty . '<br />';
    $totalamount = 0.00;
    define('TIREPRICE', 100);
    define('OILPRICE', 10);
    define('SPARKPRICE', 4);
    $totalamount = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;
    echo 'Subtotal: R$' . number_format($totalamount, 2) . '<br />';
    $taxrate = 0.10;
    $totalamount = $totalamount * (1 + $taxrate);
    echo 'Total incluindo impostos: R$' . number_format($totalamount, 2) . '<br />';
    echo '</p>';
    echo '</details>';
    ?>
</body>

</html>