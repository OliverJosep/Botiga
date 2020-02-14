<?php

require '../controller/CartController.php';
require '../views/items.php';

$uri = explode("/", trim($_SERVER['REQUEST_URI'], "/"));

switch ($uri[0]) {

  case '':
    header('Location: /productes');
    break;

  case 'productes':
    include '../views/productes.php';
    break;

  case 'color-productes':
    if ($uri[1] != null) {
      $action = $uri[1];
      $color = $uri[2];
      include '../views/colors.php';
    }
    break;

  case 'producte':
    if ($uri[1] != null) {
      $id = $uri[1];
      include '../views/producte.php';
    } else {
      header('Location: /productes');
    }
  break;

  case 'cart':
    $controller = new CartController();
    include '../views/cart.php';
  break;

  case 'cart-add':
    if (count($uri) > 1 && $uri[1] >= 0 && $uri[1] < count($items)) {
      $controller = new CartController();
      $controller->add($uri[1]);
    } else {
      header('Location: /cart');
    }

  break;

  case 'cart-del':
    if (count($uri) > 1) {
      $controller = new CartController();
      $controller->remove($uri[1]);
    } else {
      header('Location: /cart');
    }
  break;

  case 'cart-destroy':
    $controller = new CartController();
    $controller->destroyCart();
  break;

  default:
    # code...
  break;
}

// echo $uri[0];
