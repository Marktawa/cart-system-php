<?php


/* Remove products from cart deducting from quantity and subtotal
$products = [['Ham', 20], ['Cake', 15], ['Milk', 10]];
$cart = [['Ham', 20, 1, 20]];

$input = $cart[0][0];
print_r($input);
$index = array_search($input, array_column($cart, 0));
if ($cart[$index][2] > 1) {
    $cart[$index][2] -= 1;
    $cart[$index][3] -= $cart[$index][1];
}
else if ($cart[$index][2] == 1) {
    array_splice($cart, $index, 1);
}
print_r($cart);

/* Add products to cart and display quantity and subtotal
$products = [['Ham', 20], ['Cake', 15], ['Milk', 10]];
//print_r($products);

$cart = [];

$cart = [['Ham', 20, 1, 20]];

$index = $products[0];
print_r($index);

$temp = array_search($index[0], array_column($cart, 0));

var_dump($temp);
if ($temp !== FALSE) {
    $cart[$temp][2] += 1;
    $cart[$temp][3] += $cart[$temp][3];
}

else {
    //$cart[0][2] = $cart[0][2] + 1; //Item Quantity
    //$cart[0][3] = $cart[0][3] + $cart[0][1]; //Item Sub-total
    $input = array_search($index[0], array_column($products, 0));
    $item = [$products[$input][0], $products[$input][1], 1, $products[$input][1]];
    print_r($item);
    $cart[] = $item;
}
//$cart[$temp] = 
print_r($cart);


/*if (array_search($index[0], array_column($cart, 0)) {
    $temp = array_search($index, $cart);
    $cart[$temp] = 

$cart[] = $products[1];
print_r($cart);*/
?>