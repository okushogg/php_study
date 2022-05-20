<?php
require('intax.php');

$price = 3150;
$price_tax = intax($price);
echo $price_tax;

?>