<?php

session_start();

require 'items.php';
if (!isset($_SESSION['colorsList'])) $_SESSION['colorsList'] = array();
if (!isset($_SESSION['total'])) $_SESSION['total'] = 0;

function exists($color) {
  if (!isset($_SESSION['colorsList'])) $_SESSION['colorsList'] = array();
  for($i = 0; $i < count($_SESSION['colorsList']); $i++) {
    if ($color == $_SESSION['colorsList'][$i]) return true ;
  }
}
// var_dump($_SESSION["colorsList"]);

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/5de91a6d37.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <title>Botiga</title>
</head>
<body>
  <div class="aaa"></div>
<div class="container">
  <div class="row">
    <div class="col-2">
      <ul class="navbar-nav mr-auto">
        FILTRE:
        <li class="nav-item"><a class="nav-link" href="/color-productes/<?php echo $status = (!exists("groc")) ? $status = "add" : $status = "remove" ?>/groc"><i class="fa<?php echo $icon = (!exists("groc")) ? $icon = "r " : $icon = "s " ?>fa-square"></i> Groc</a></li>
        <li class="nav-item"><a class="nav-link" href="/color-productes/<?php echo $status = (!exists("negre")) ? $status = "add" : $status = "remove" ?>/negre"><i class="fa<?php echo $icon = (!exists("negre")) ? $icon = "r " : $icon = "s " ?>fa-square"></i> Negre</a></li>
        <li class="nav-item"><a class="nav-link" href="/color-productes/<?php echo $status = (!exists("rosa")) ? $status = "add" : $status = "remove" ?>/rosa"><i class="fa<?php echo $icon = (!exists("rosa")) ? $icon = "r " : $icon = "s " ?>fa-square"></i> Rosa</a></li>
      </ul>
      <div class="container text-center mt-3">
        <a href="cart"><i class="fas fa-shopping-cart"></i></a>
        <p>Total: <?php if (isset($_SESSION['total'])) echo $_SESSION['total'] ?> €</p>
      </div>
    </div>

    <div class="col-10">
      <div class="row">
      <!-- Colors selected -->

      <?php if ($_SESSION['colorsList']) : ?>
        <?php foreach ($_SESSION['colorsList'] as $color => $valueColor) :?>
          <?php foreach ($items as $item => $valueItem) : ?>
            <?php if ($items[$item]["color"] == $_SESSION['colorsList'][$color]) : ?>
            <div class="card m-1" style="width: 18rem;">
              <img class="card-img-top" src="/img/<?php echo $item ?>.webp" alt="Card image cap">
              <div class="card-body">
                <p class="card-text"><?php echo $items[$item]["nom"] ?></p>
                <p class="card-text"><?php echo $items[$item]["preu"] ?>€</p>
                <a href="/producte/<?php echo $item?>" class="btn btn-primary">Select</a>
                <a href="/cart-add/<?php echo $item ?>" class="ml-2 btn btn-success">Buy</a>
              </div>
            </div>
            <?php endif; ?>
          <?php endforeach;  ?>
        <?php endforeach;  ?>
      <?php else : ?>
        <?php foreach ($items as $item => $valueItem) : ?>
        <div class="card m-1" style="width: 18rem;">
          <img class="card-img-top" src="/img/<?php echo $item ?>.webp" alt="Card image cap">
          <div class="card-body">
            <p class="card-text"><?php echo $items[$item]["nom"] ?></p>
            <p class="card-text"><?php echo $items[$item]["preu"] ?>€</p>
            <a href="/producte/<?php echo $item?>" class="btn btn-primary">Select</a>
            <a href="/cart-add/<?php echo $item ?>" class="ml-2 btn btn-success">Buy</a>
          </div>
        </div>
        <?php endforeach;  ?>
      <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <h1>Last visited</h1>
  <div class="row">
    <?php if (!isset($_SESSION['last'])) : ?>
      <h3>Not yet!</h3>
    <?php else : ?>
      <?php foreach ($_SESSION['last'] as $product) : ?>
        <div class="card col-3" style="width: 18rem;">
          <img class="card-img-top" src="/img/<?php echo $product ?>.webp" alt="Card image cap">
          <div class="card-body">
            <p class="card-text"><?php echo $items[$product]["nom"] ?></p>
            <p class="card-text"><?php echo $items[$product]["preu"] ?>€</p>
            <a href="/producte/<?php echo $product?>" class="btn btn-primary">Select</a>
            <a href="/cart-add/<?php echo $product ?>" class="ml btn btn-success">Buy</a>
          </div>
        </div>
      <?php endforeach;  ?>
    <?php endif; ?>

  </div>
</div>
</body>
</html>

<?php
