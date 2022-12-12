<?php
//detail page
echo '<title>Car Finder</title>';
require_once('setup.php');


$query=$connection->prepare('SELECT * from products where PID = ?');
$query->execute([$_GET['name']]);
$products=$query->fetch();

echo '<h1>'.$products['Year'].' '.$products['Make'].' '.$products['Model'].'</h1>';
echo '';




?>