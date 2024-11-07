<!--
Products if physical should have inventory management.
Quantity of products in inventory should be known.
Quantity of prdoucts in inventory should be added to array
When customer clicks proceed to checkout a function is called that will first check if there are enough products in the inventory to satisfy the order, if not the checkout process is aborted with the message not enough inventory to satisfy order.

This also means that periodically the product list should be updated. If stock is out for a particular product tehn put a text "OTu of Stock" to the client and disable the Add to Cart button.

If there are enough products in inventory, the function then deducts the stock levels using the values from the cart. After deduction, the function displays a Checkout block for the customer to enter their details to complete the order. Customer is given a timeline to complete the order or else the order is cancelled and inventory is updated to add the once removed items
-->

<?php
session_start();

$products = [['Ham', 20], ['Cake', 15], ['Milk', 10]];

$cart_total = 0;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
    /*$_SESSION['cart'][0] = [];
    $_SESSION['cart'][1] = [];*/
}

//Add Product to Cart
if (isset($_POST['product'])) {
    $input = $_POST['product'];
    $index = array_search($input, array_column($_SESSION['cart'], 0));

    if ($index !== FALSE) {
        $_SESSION['cart'][$index][2] += 1;
        $_SESSION['cart'][$index][3] += $_SESSION['cart'][$index][1];
    }

    else {
        $temp = array_search($input, array_column($products, 0));
        $item = [$products[$temp][0], $products[$temp][1], 1, $products[$temp][1]];
        $_SESSION['cart'][] = $item;
    }

    //$_SESSION['cart'][] = $products[$index];
    //print_r($_SESSION['cart']);
}

if (isset($_POST['cart'])) {
    $input = $_POST['cart'];
    $index = array_search($input, array_column($_SESSION['cart'], 0));

    if ($_SESSION['cart'][$index][2] > 1) {
        $_SESSION['cart'][$index][2] -= 1;
        $_SESSION['cart'][$index][3] -= $_SESSION['cart'][$index][1];
    }

    else {
        array_splice($_SESSION['cart'], $index, 1); 
    }   
}

$total = array_column($_SESSION['cart'], 3);
for ($i = 0; $i < count($total); $i++) {
    $cart_total += $total[$i];
}
?>

<h1>My Store</h1>
<h2>Products</h2>
<ul>
    <?php for ($i = 0; $i < count($products); $i++): ?>
        <li>
            <form action='/' method='POST'>
                <label><?php echo $products[$i][0].",  $".$products[$i][1]; ?>
                    <button type='submit' name='product'
                        value='<?php echo $products[$i][0]; ?>'>Add
                    </button>
                </label>
            </form>
        </li>
    <?php endfor; ?>
</ul>

<h2>Cart</h2>
<ul>
    <?php for ($i = 0; $i < count($_SESSION['cart']); $i++): ?>
        <li>
            <form action='/' method='POST'>
                <label><?php echo $_SESSION['cart'][$i][0].", $".$_SESSION['cart'][$i][1]." x ".$_SESSION['cart'][$i][2].", $".$_SESSION['cart'][$i][3]; ?>
                    <button type='submit' name='cart'
                        value='<?php echo $_SESSION['cart'][$i][0]; ?>'>Pop
                    </button>
                </label>
            </form>
        </li>
    <?php endfor; ?>
</ul>
<h3>Cart Total</h3>
<hr>
<p><?php echo "$ ".$cart_total; ?></p>

<!-- Product List and Cart with Price PHP and Total 
< ?php
session_start();

$products = [['Ham', 20], ['Cake', 15], ['Milk', 10]];

$cart_total = 0;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
    /*$_SESSION['cart'][0] = [];
    $_SESSION['cart'][1] = [];*/
}

if (isset($_POST['product'])) {
    $input = $_POST['product'];
    $index = array_search($input, array_column($products, 0));
    $_SESSION['cart'][] = $products[$index];
    print_r($_SESSION['cart']);
}

if (isset($_POST['cart'])) {
    $input = $_POST['cart'];
    $index = array_search($input, array_column($_SESSION['cart'], 0));
    array_splice($_SESSION['cart'], $index, 1);    
}

$total = array_column($_SESSION['cart'], 1);
for ($i = 0; $i < count($total); $i++) {
    $cart_total += $total[$i];
}
?>

<h1>My Store</h1>
<h2>Products</h2>
<ul>
    < ?php for ($i = 0; $i < count($products); $i++): ?>
        <li>
            <form action='/' method='POST'>
                <label>< ?php echo $products[$i][0]."  $".$products[$i][1]; ?>
                    <button type='submit' name='product'
                        value='< ?php echo $products[$i][0]; ?>'>Add
                    </button>
                </label>
            </form>
        </li>
    < ?php endfor; ?>
</ul>

<h2>Cart</h2>
<ul>
    < ?php for ($i = 0; $i < count($_SESSION['cart']); $i++): ?>
        <li>
            <form action='/' method='POST'>
                <label>< ?php echo $_SESSION['cart'][$i][0]." $".$_SESSION['cart'][$i][1]; ?>
                    <button type='submit' name='cart'
                        value='< ?php echo $_SESSION['cart'][$i][0]; ?>'>Pop
                    </button>
                </label>
            </form>
        </li>
    < ?php endfor; ?>
</ul>
<h3>Cart Total</h3>
<hr>
<p>< ?php echo "$ ".$cart_total; ?></p> -->


<!-- Product List with Price PHP 
< ?php
$products = [['Ham', 20], ['Cake', 15], ['Milk', 10]];
?>

<h1>My Store</h1>
<h2>Products</h2>
<ul>
    < ?php for ($i = 0; $i < count($products); $i++): ?>
        <li>
            <form action='/' method='POST'>
                <label>< ?php echo $products[$i][0]."  $".$products[$i][1]; ?>
                    <button type='submit' name='product'
                        value='< ?php echo $products[$i][0]; ?>'>Add
                    </button>
                </label>
            </form>
        </li>
    < ?php endfor; ?>
</ul>
    -->

<!-- Product List with Price HTML
<h1>My Store</h1>
<h2>Products</h2>
<ul>
    <li>
       Ham $15 
    </li>
    <li>
       Cake $20 
    </li>
    <li>
       Milk $10 
    </li>
</ul>
-->
<!-- TODO
 - Add prices multi dimaensional array
 - Add Cart Total
 - Add Cart Reset -->

<!-- Remove items from cart 
< ?php
session_start();

$products = ['Ham', 'Cake', 'Milk'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['product'])) {
    $_SESSION['cart'][] = $_POST['product'];
}

if (isset($_POST['cart'])) {
    $input = $_POST['cart'];
    $index = array_search($input, $_SESSION['cart']);
    array_splice($_SESSION['cart'], $index, 1);    
}
?>

<h1>My Store</h1>
<h2>Products</h2>
<ul>
    < ?php for ($i = 0; $i < count($products); $i++): ?>
        <li>
            <form action='/' method='POST'>
                <label>< ?php echo $products[$i]; ?>
                    <button type='submit' name='product'
                        value='< ?php echo $products[$i]; ?>'>Add
                    </button>
                </label>
            </form>
        </li>
    < ?php endfor; ?>
</ul>
<h2>Cart</h2>
<ul>
    < ?php for ($i = 0; $i < count($_SESSION['cart']); $i++): ?>
        <li>
            <form action='/' method='POST'>
                <label>< ?php echo $_SESSION['cart'][$i]; ?>
                    <button type='submit' name='cart'
                        value='< ?php echo $_SESSION['cart'][$i]; ?>'>Pop
                    </button>
                </label>
            </form>
        </li>
    < ?php endfor; ?>
</ul>

<!-- Remobe item from cart test
< ?php
/*$cart = ['Ham', 'Milk', 'Honey'];

if (isset($_POST['cart'])) {
    $input = $_POST['cart'];
    $index = array_search($input, $cart);
    array_splice($cart, $index, 1);
    print_r($cart);
}*/
?>


<form action="/" method="POST">
    <button type="submit" name="cart" value="Milk">Pop</button>
</form>
-->

<!-- Display Cart Products
< ?php
session_start();

$products = ['Ham', 'Cake', 'Milk'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['product'])) {
    $_SESSION['cart'][] = $_POST['product'];
}
?>

<h1>My Store</h1>
<h2>Products</h2>
<ul>
    < ?php for ($i = 0; $i < count($products); $i++): ?>
        <li>
            <form action='/' method='POST'>
                <label>< ?php echo $products[$i]; ?>
                    <button type='submit' name='product'
                        value='< ?php echo $products[$i]; ?>'>Add
                    </button>
                </label>
            </form>
        </li>
    < ?php endfor; ?>
</ul>
<h2>Cart</h2>
<ul>
    < ?php for ($i = 0; $i < count($_SESSION['cart']); $i++): ?>
        <li>
            <form action='/' method='POST'>
                <label>< ?php echo $_SESSION['cart'][$i]; ?>
                    <button type='submit' name='cart'
                        value='< ?php echo $_SESSION['cart'][$i]; ?>'>Pop
                    </button>
                </label>
            </form>
        </li>
    < ?php endfor; ?>
</ul>-->

<!-- Snippet for persistent cart
< ?php/*
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['product'])) {
    $_SESSION['cart'][] = $_POST['product'];
    print_r($_SESSION['cart']);
    var_dump($_SESSION['cart']);
}
?>


<form action="/" method="POST">
    <label>
        Ham
        <button type="submit" name="product" value="Ham">Add</button>
    </label>
</form>
-->

<!-- Non persitent cart working 
< ?php
$products = ['Ham', 'Cake', 'Milk'];
$cart = [];

if (isset($_POST['product'])) {
    $cart[] = $_POST['product'];
}
?>

<h1>My Store</h1>
<h2>Products</h2>
<ul>
    < ?php for ($i = 0; $i < count($products); $i++): ?>
        <li>
            <form action='/' method='POST'>
                <label>< ?php echo $products[$i]; ?>
                    <button type='submit' name='product'
                        value='< ?php echo $products[$i]; ?>'>Add
                    </button>
                </label>
            </form>
        </li>
    < ?php endfor; ?>
</ul>
<h2>Cart</h2>
<ul>
    < ?php for ($i = 0; $i < count($cart); $i++): ?>
        <li>
            <form action='/' method='POST'>
                <label>< ?php echo $cart[$i]; ?>
                    <button type='submit' name='cart'
                        value='< ?php echo $cart[$i]; ?>'>Pop
                    </button>
                </label>
            </form>
        </li>
    < ?php endfor; ?>
</ul>
-->

<!-- Testing out Add items to array
< ?php
$cart = [];
if (isset($_POST['product'])) {
    $cart[] = "Cake";
    $cart[] = "Milk";
    $cart[] = $_POST['product'];
    //print_r($cart);
    //var_dump($cart);
}
?>

<form action="/" method="POST">
    <label>
        Ham
        <button type="submit" name="product" value="Ham">Add</button>
    </label>
</form>
-->


<!-- Display Cart raw html
<h1>My Store</h1>
<h2>Products</h2>
<ul>
    <li>
        <p>Ham</p>
        <form action="/" method="POST">
            <button type="submit" name="product" value="Ham">Add</button>
        </form>
    </li>
    <li>
        <p>Cake</p>
        <form action="/" method="POST">
            <button type="submit" name="product" value="Cake">Add</button>
        </form>        
    </li>
    <li>
        <p>Milk</p>
        <form action="/" method="POST">
            <button type="submit" name="product" value="Milk">Add</button>
        </form>         
    </li>
</ul>
<h2>Cart</h2>
<ul>
    <li>Ham</li>
    <li>Ham</li>
    <li>Cake</li>
    <li>Milk</li>
    <li>Ham</li>
    <li>Milk</li>
</ul>
-->

<!-- Display products PHP with Add button form input
< ?php
$products = ['Ham', 'Cake', 'Milk'];
?>

<h1>My Store</h1>
<h2>Products</h2>
<ul>
    < ?php
    for ($i = 0; $i < count($products); $i++) {
        echo "
                <li>
                    <p>$products[$i]</p>
                    <form action='/' method='POST'>
                        <button type='submit' name='product' value='$products[$i]'>Add</button>
                    </form>
                </li>
                ";
    }
    ?>
</ul>
    -->

<!-- Display products raw HTML with Add button form input 
<h1>My Store</h1>
<h2>Products</h2>
<ul>
    <li>
        <p>Ham</p>
        <form action="/" method="POST">
            <button type="submit" name="product" value="Ham">Add</button>
        </form>
    </li>
    <li>
        <p>Cake</p>
        <form action="/" method="POST">
            <button type="submit" name="product" value="Cake">Add</button>
        </form>        
    </li>
    <li>
        <p>Milk</p>
        <form action="/" method="POST">
            <button type="submit" name="product" value="Milk">Add</button>
        </form>         
    </li>
</ul>
-->

<!-- Display Products from array, loop through array
< ?php
$products = ['Ham', 'Cake', 'Milk'];
?>

<h1>My Store</h1>
<h2>Products</h2>
<ul>
< ?php
for ($i = 0; $i < count($products); $i++) {
    echo "<li>$products[$i]</li>";
}
?>
</ul>
-->
<!-- Display Products from Array
< ?php
$products = ['Ham', 'Cake', 'Milk'];
?>

<h1>My Store</h1>
<h2>Products</h2>
<ul>
< ?php
echo
"<li>$products[0]</li>
    <li>$products[1]</li>
    <li>$products[2]</li>";
?>
</ul>
-->

<!-- Display Products 
<h1>My Store</h1>
<h2>Products</h2>
<ul>
    <li>Ham</li>
    <li>Cake</li>
    <li>Milk</li>
</ul>
-->
<!-- Sidetrack
<form action="/" method="post">
    <input type="text" name="text" size="3" />
    <input type="submit" value="Submit Order" />
</form>
< ?php
if (isset($_POST['text'])) {
    echo $_POST['text'];
}
?>
-->
<!-- Stage 1
<h1>Hello World</h1>-->