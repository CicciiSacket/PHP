 
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

$mysqli = connectDB('localhost','root','root');
useDB($mysqli,'EsercizioComplicato');

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
    <form method="post" action="index.php" autocomplete="on">
        <input type="email" name="email" placeholder="prova@mail.com">
        <br><br>
        <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
        title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password">
        <br><br>
        <input type="submit" value="LOGIN" name="submit">
        <button class="btn btn-primary btn-block btn-large"><a href="Registration.php" style="text-decoration: none; color: blue;">REGISTER</button>
        <br><br>
        <span style="color:red;"><?php echo $error;?></span>
    </form>
</div>


</body>     
</html>



