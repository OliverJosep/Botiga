<?php

require 'items.php';

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <title>Cart</title>
  <script src="https://kit.fontawesome.com/5de91a6d37.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
  <div class="row my-4">

    <?php if (!isset($_SESSION['cart'])) : ?>
      <h1>El carrito esta vacio,  seleccione algun producto</h1>
      <?php else : ?>
    <table class="table table-striped">
      <thead>
      <tr class="table-primary">
        <th scope="col">Article</th>
        <th class="text-center" scope="col">Quantitat</th>
        <th class="text-center" scope="col">Preu</th>
        <th class="text-center" scope="col"></th>

      </tr>
      </thead>
      <tbody>
      <?php foreach ($_SESSION['cart'] as $product => $value) : ?>
        <tr>
          <td><?php echo $items[$_SESSION['cart'][$product]['id']]["nom"] ?></td>
          <td class="text-center"><?php echo $_SESSION['cart'][$product]['quantity'] ?></td>
          <td class="text-center"><?php echo $items[$_SESSION['cart'][$product]['id']]["preu"] ?> €</td>
          <td class="text-center"><a href="/cart-del/<?php echo $_SESSION['cart'][$product]['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
      <?php endforeach  ?>
      <thead>
      <tr>
        <th scope="col"></th>
        <th class="text-center" scope="col">TOTAL</th>
        <th class="text-center" scope="col"><?php echo $_SESSION['total']; ?> €</th>
        <th scope="col"></th>

      </tr>
      </thead>
      </tbody>
    </table>

      <?php endif; ?>
  </div>
  <div class="row">
    <a href="productes" class="btn btn-primary">SEGUIR COMPRANT</a>
    <a href="cart-destroy" class="ml-1 btn btn-danger"><i class="fas fa-trash-alt"></i></a>
  </div>
</div>
</body>
</html>
