<html>

<head>
    <title>Sistema de Pedidos</title>
    <link rel="stylesheet" href="./css/styles.css" type="text/css" />
</head>

<body>
    <h1>Sistema de Pedidos</h1>
    <h2> Resultados do Pedido </h2>
    <?php
    $tireqty = $_POST['tireqty'];
    $oilqty = $_POST['oilqty'];
    $sparkqty = $_POST['sparkqty'];
    echo '<p>Ordem processada às ';
    echo date('H:i, jS M Y');
    echo '</p>';
    echo '<p>Seu pedido é como segue: </p>';
    echo htmlspecialchars($tireqty) . ' pneus<br />';
    echo htmlspecialchars($oilqty) . ' litros de óleo<br />';
    echo htmlspecialchars($sparkqty) . ' velas de ignição<br />';
    $totalqty = 0;
    $totalqty = $tireqty + $oilqty + $sparkqty;
    echo 'Items ordered: ' . $totalqty . '<br />';
    $totalamount = 0.00;
    define('TIREPRICE', 100);
    define('OILPRICE', 10);
    define('SPARKPRICE', 4);
    $totalamount = $tireqty * TIREPRICE
        + $oilqty * OILPRICE
        + $sparkqty * SPARKPRICE;
    echo 'Subtotal: $' . number_format($totalamount, 2) . '<br />';
    $taxrate = 0.10;
    $totalamount = $totalamount * (1 + $taxrate);
    echo 'Total incluindo impostos: $' . number_format($totalamount, 2) . '<br />';
    ?>
</body>

</html>