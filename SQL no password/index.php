<?php

if($_SERVER['SERVER_PORT'] !== 443 &&
   (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off')) {
  header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
  exit;
}

$filename = 'php/dbConnect.php';

if (file_exists($filename)) {
    header("Location: home.php");
} else {
    header("Location: setup.php");
}
?>
