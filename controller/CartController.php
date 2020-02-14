<?php

class CartController {

  public $cart = array();
  public $total = 0;

  function __construct() {
    session_start();
    $_SESSION["cart"] = (!isset($_SESSION['cart'])) ? $this->cart : $this->cart = $_SESSION["cart"];
  }

  function add($id) {
    if ($this->exists($id)) {
      $this->cart[$this->getId($id)]['quantity']++;
    } else {
      array_push($this->cart , array("id" => $id, "quantity" => 1));
    }
    $_SESSION["cart"] = $this->cart;
    $this->getTotal();
    header('Location: /cart');
  }

  function remove($id) {
    unset($this->cart[$this->getId($id)]);
    $this->cart = array_values($this->cart);
    if (count($this->cart) == 0) $this->destroyCart();
    $_SESSION["cart"] = $this->cart;
    $this->getTotal();
    header('Location: /cart');
  }

  function destroyCart() {
    $_SESSION["cart"] = $this->cart = null;
    $_SESSION["total"] = $this->total = 0;
    $this->getTotal();
    header('Location: /productes');
  }

  function getTotal() {
    $this->total = 0;
    global $items;
    if (!isset($_SESSION['cart'])) return 0;
    foreach ($this->cart as $product => $value) {
      $this->total += ($items[$this->cart[$product]['id']]["preu"] * $this->cart[$product]['quantity']);
    }
    $_SESSION['total'] = $this->total;
  }

  function exists($id) {
    foreach ($this->cart as $product => $value) {
      if ($this->cart[$product]['id'] == $id) {
        return true;
      }
    }
  }

  function getId($id) {
    foreach ($this->cart as $product => $value) {
      if ($this->cart[$product]['id'] == $id) {
        return $product;
      }
    }
  }



}
