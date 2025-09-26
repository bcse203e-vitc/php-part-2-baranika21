<?php
$products = [];

// Read file into array
$lines = file("2products.txt", FILE_IGNORE_NEW_LINES);
foreach ($lines as $line) {
    list($name, $price) = explode(",", $line);
    $products[] = ["name" => $name, "price" => (int)$price];
}

// Sort ascending by price
usort($products, fn($a, $b) => $a['price'] <=> $b['price']);

echo "<h3>Product List</h3>";
echo "<table border='1' cellpadding='5'>
<tr><th>Product Name</th><th>Price</th></tr>";
foreach ($products as $p) {
    echo "<tr><td>{$p['name']}</td><td>{$p['price']}</td></tr>";
}
echo "</table>";
?>

