<?php
require_once 'ManageDB.php';
$mysqli = connectDB('localhost','root','root');
useDB($mysqli,'EsercizioComplicato');
session_start();
$_SESSION['utente'];
$_SESSION['userID']; 
if (!$_SESSION['userID']) {
    header("Location: index.php");
}     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Products</title>
</head>
<body>

<?php 
$items = 3;
$page = $_POST['sec'];
$oofs = ($page - 1) * $items;
    $query_string = "SELECT * FROM Products LIMIT $items OFFSET $oofs ";
    $res = $mysqli->query($query_string);
    while($row = mysqli_fetch_assoc($res)) {
        echo "<li>". "id: " . $row["id_products"]. " - name: " . $row["name_products"] . " - price: " . $row["price"] ."<br>" . "</li>";
    }        
?>  
<br><br>
<form action="" method="post">
    <input type="submit" value=1  name = "sec">
    <input type="submit" value=2  name = "sec">
    <input type="submit" value=3  name = "sec">
    <input type="submit" value=4  name = "sec">
</form>
</body>
</html>
