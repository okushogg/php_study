<?php
$price = 3000;
$discount_price = 300;
$discount_rate = floor($discount_price/$price *100);
echo "$price 円のものから、$discount_price 円値引きした場合、$discount_rate%引きです。";
?>