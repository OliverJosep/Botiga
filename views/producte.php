<?php

session_start();

require 'items.php';

if (!isset($_SESSION["last"])) $_SESSION["last"] = array();

orderLast($id);

function orderLast($id) {
  if (in_array($id,$_SESSION['last'])) remove($id);
  array_unshift($_SESSION['last'] , $id);
  if (count($_SESSION['last']) > 4 ) unset($_SESSION['last'][4]);
}
function remove($id) {
  for($i = 0; $i < count($_SESSION['last']); $i++) {
    if ($id == $_SESSION['last'][$i]) unset($_SESSION['last'][$i]);
    $_SESSION['last'] = array_values($_SESSION['last']);
  }
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <title>Producte</title>
</head>
<body>
<div class="container">
  <div class="row">
    <h1><?php echo $items[$id]["nom"]; ?></h1>
  </div>
  <div class="row">
    <img class="w-25" src="http://www.botiga.cat/img/<?php echo $id ?>.webp" alt="">
  </div>
  <div class="row">
    <a href="/" class="btn btn-primary">TORNAR A LA LLISTA</a>
    <a href="/cart-add/<?php echo $id ?>" class="ml-2 btn btn-success">COMPRAR</a>
  </div>
</div>
</body>
</html>
<?php
