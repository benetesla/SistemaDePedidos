<html>

<head>
    <title>Sistema de Pedidos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="./css/styles.css" />

<body>
    <h1>Sistema de Pedidos</h1>
    <h2>Seu pedido foi processado</h2>
    <?php
    echo "<div class='container'>";
    if (empty($_POST['tireqty']) && empty($_POST['oilqty']) && empty($_POST['sparkqty'])) {
        echo "<p>Você não selecionou nenhum item.</p>";
        exit;
    } elseif (empty($_POST['adress'])) {
        echo "<p>Você não informou o endereço de entrega.</p>";
        exit;
    } else {
        echo "<p>Seu pedido foi processado.</p>";
    }
    $tireqty = $_POST['tireqty'];
    $oilqty = $_POST['oilqty'];
    $sparkqty = $_POST['sparkqty'];
    $adress = $_POST['adress'];
    $find = $_POST['find'];

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
    echo "<p>Valor total: R$" . number_format($totalamount, 2) . "</p>";
    $taxrate = 0.10;
    $totalamount = $totalamount * (1 + $taxrate);
    if ($tireqty < 10) {
        $discount = 0;
    } elseif ($tireqty >= 10 && $tireqty <= 49) {
        $discount = 5;
    } elseif ($tireqty >= 50 && $tireqty <= 99) {
        $discount = 10;
    } elseif ($tireqty >= 100 && $tireqty <= 149) {
        $discount = 15;
    } elseif ($tireqty >= 150) {
        $discount = 20;
    }
   echo "<p> Voce encontrou a loja por: </p>";
    switch ($find) {
        case "a":
            echo "<p>
            Amigo 
            </p>";
            break;
        case "b":
            echo "<p>
            Google
            </p>";
            break;
        case "c":
            echo "<p>
            Anuncio de TV
            </p>";
            break;
        default:
            echo "<p>
            Outro
            </p>";
            break;
    }
    echo "<p>Incluindo o imposto de R$" . number_format($totalamount, 2) . "</p>";
    echo "<p>Desconto: $discount%</p>";
    $totalamount = $totalamount * (1 - $discount / 100);
    echo "<p>Valor total: R$" . number_format($totalamount, 2) . "</p>";
    echo "<p>Endereço de entrega: $adress</p>";
    echo "</div>";
    ?>
</body>

</html>