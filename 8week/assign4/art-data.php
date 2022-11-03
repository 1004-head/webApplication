<?php
  $file1 = '116010.jpg';
  $product1 = 'Artist Holding a Thistle';
  $quantity1 = 3;
  $price1 = 500;

  $file2 = '113010.jpg';
  $product2 = 'Self-portrait in a Straw Hat';
  $quantity2 = 1;
  $price2 = 700;

  $subtotal = 0;
  $tax = 0;
  $shipping = 0;
  $grandtotal = 0;
  function subtotal(){
    $GLOBALS['subtotal'] = $GLOBALS['quantity1']*$GLOBALS['price1'] + $GLOBALS['quantity2']*$GLOBALS['price2'];
    echo '$'.$GLOBALS['subtotal'];
  }
  function tax(){
    $GLOBALS['tax'] = $GLOBALS['subtotal']*0.1;
    echo '$'.$GLOBALS['tax'];
  }
  function shipping(){
    if($GLOBALS['subtotal'] > 2000) $GLOBALS['shipping'] = 0;
    else $GLOBALS['shipping'] = 100;
    echo '$'.$GLOBALS['shipping'];
  }
  function grandtotal(){
    $GLOBALS['grandtotal'] = $GLOBALS['subtotal']+$GLOBALS['tax']+$GLOBALS['shipping'];
    echo '$'.$GLOBALS['grandtotal'];
  }
?>