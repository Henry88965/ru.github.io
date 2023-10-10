<?php

include("member_connect.php");
session_start();

$sq="Select * from goods where G_id={$_GET['id']}";


$result=mysqli_query($cons, $sq);

$shop=mysqli_fetch_assoc($result);

echo "<td><img src='../img/". $shop['G-photo'] .".jpg' width = 100px></td>";
echo "<h3>". $shop['G-name']. "</h3>";
echo "<p>價錢：". $shop['G-money']. "</p>";



?>