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
    $adress = $_POST['adress'];
   
    $totalqty = 0;
    $totalqty = $tireqty + $oilqty + $sparkqty;
    echo "<p>Itens pedidos: $totalqty</p>";
    $totalamount = 0.00;
    define('TIREPRICE', 100);
    define('OILPRICE', 10);
    define('SPARKPRICE', 4);
    $totalamount = $tireqty * TIREPRICE
        + $oilqty * OILPRICE
        + $sparkqty * SPARKPRICE;
    echo "<p>Valor total: R$".number_format($totalamount,2)."</p>";
    $taxrate = 0.10; 
    $totalamount = $totalamount * (1 + $taxrate);
    echo "<p>Incluindo o imposto de R$".number_format($totalamount,2)."</p>";
    echo "<p>Endereço de entrega: $adress</p>";
    
    ?>
</body>

</html>