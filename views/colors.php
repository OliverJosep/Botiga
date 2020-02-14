<?php

session_start();

if ($action == "add") {
  if (!exists($color)) array_push($_SESSION['colorsList'] , $color);
} elseif ($action == "remove") {
  if (exists($color)) remove($color);
}
var_dump($_SESSION['colorsList']);
header('Location: /');

function exists($color) {
  if (!isset($_SESSION['colorsList'])) $_SESSION['colorsList'] = array();
  for($i = 0; $i < count($_SESSION['colorsList']); $i++) {
    if ($color == $_SESSION['colorsList'][$i]) return true ;
  }
}

function remove($color) {
  for($i = 0; $i < count($_SESSION['colorsList']); $i++) {
    if ($color == $_SESSION['colorsList'][$i]) unset($_SESSION['colorsList'][$i]);
    $_SESSION['colorsList'] = array_values($_SESSION['colorsList']);
  }
}
