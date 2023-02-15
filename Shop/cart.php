<?php
session_start();
require_once('./File/CreateDB.php');
require_once('./File/component.php');
$db = new CreateDB("Productdb", "Producttb");
if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_id'] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Produto removido do carrinho!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de compras</title>
    <link rel="icon" href="./upload/Wheel_Squad.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">
    <?php
    require_once('./File/Header.php');
    ?>
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6 class="text-center">
                        <i class="fas fa-shopping-cart"></i> Meu carrinho
                    </h6>
                    <hr>
                    <?php
                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        $product_id = array_column($_SESSION['cart'], 'product_id');
                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)) {
                            foreach ($product_id as $id) {
                                if ($row['id'] == $id) {
                                    cartElement(
                                        $row['product_image'],
                                        $row['product_name'],
                                        $row['product_price'],
                                        $row['id']
                                    );
                                    $total = $total + (int)$row['product_price'];
                                }
                            }
                        } 
                    } else {
                        echo "<h5 class='text-center'>Carrinho vazio</h5>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-5 border rounded mt-5 bg-white h-25">
                <div class="pt-4">
                    <h6 class="text-center">Detalhes do pedido</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6 ">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo "<h6>Preço ($count itens)</h6>";
                            } else {
                                echo "<h6>Preço (0 itens)</h6>";
                            }
                            ?>
                            <h6>Taxa de entrega</h6>
                            <hr>
                            <h6>Total</h6>
                        </div>
                        <div class="col-md-6">
                            <h6><?php
                                if (isset($_SESSION['cart'])) {
                                    echo "R$" . $total;
                                } else {
                                    echo "R$0";
                                }
                                ?>
                            </h6>
                            <h6 class="text-success">Grátis</h6>
                            <hr>
                            <h6>
                                <?php
                                if (isset($_SESSION['cart'])) {
                                    echo "R$" . $total;
                                } else {
                                    echo "R$0";
                                }
                                ?>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>