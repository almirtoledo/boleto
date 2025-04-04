<?php

require __DIR__ . '/vendor/autoload.php';



if (isset($_GET['boleto'])) {
  require __DIR__ . '/src/Boleto.php';
} else {
  require __DIR__ . '/src/Bradesco.php';
}
