<?php

include "connect.php";


$p_id = $_POST['id'];
$output = '';

$sql = "SELECT Nama, Harga, Deskripsi FROM products where ProductsId=".$p_id;
$result = mysqli_query($db, $sql);

 

   while($row = mysqli_fetch_assoc($result)) {
      $output .= "<h3>". $row['Nama']. "</h3>";
      $output .= "<p>". "<a>" . "Rp " . "</a>". $row['Harga']. "</p>";
    $output .= "<p>". $row['Deskripsi']. "</p>";
 }

echo $output;

//$output .= "<p>Id: ".$row["Deskripsi"]."</p>";