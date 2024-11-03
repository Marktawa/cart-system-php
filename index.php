<!-- TODO
 - Add prices multi dimaensional array
 - Add Cart Total
 - Add Cart Reset -->

<!-- Remove items from cart -->
<?php
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
    <?php for ($i = 0; $i < count($products); $i++): ?>
        <li>
            <form action='/' method='POST'>
                <label><?php echo $products[$i]; ?>
                    <button type='submit' name='product'
                        value='<?php echo $products[$i]; ?>'>Add
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
                <label><?php echo $_SESSION['cart'][$i]; ?>
                    <button type='submit' name='cart'
                        value='<?php echo $_SESSION['cart'][$i]; ?>'>Pop
                    </button>
                </label>
            </form>
        </li>
    <?php endfor; ?>
</ul>

<!-- Remobe item from cart test
<?php
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