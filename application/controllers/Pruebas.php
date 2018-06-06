<?php
  $received = json_decode($_POST['items'])[0];
  print_r($received);
  $item1["name"] = 'anadansd';
  $item1["sku"] = '32321';
  $item1["description"] = 'prueba';
  $item1["currency"] ="USD";
  $item1["quantity"] =1;
  $item1["price"] = '200';
  print_r($item1);
?>
