 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome!</title>
</head>
<body style="background-color: #E0FFFF;">

<?php
require_once 'ManageDB.php';
session_start();
$_SESSION['userID']; 
if ($_SESSION['userID']) {
    header("Location: Home.php");
}


$mysqli = connectDB('localhost','root','root');
useDB($mysqli,'Esame');

$mail = $_POST["email"];
$password =$_POST["password"];
$error=" ";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($mail) || empty($password)) {
        $error = "* Insert mail or passowrd";
    }
    else { 
        login($mysqli,$mail,$password);
        $error = "* Errore credenziali";
    }
}
?>
<div class="login">
    <h1>LOGIN</h1>
    <form method="get" action="index.php" autocomplete="on">
        <input type="email" name="email" placeholder="prova@mail.com">
        <br><br>
        <input type="password" name="password" placeholder="Password">
        <br><br>
        <input type="submit" value="LOGIN" name="submit">
        <span style="color:red;"><?php echo $error;?></span>
    </form>
</div>

</body>     
</html>



