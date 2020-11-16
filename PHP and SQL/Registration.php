<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Registrazione</title>
</head>
<body>

<?php 
require_once 'ManageDB.php';
$mysqli = connectDB('localhost','root','root');
useDB($mysqli,'EsercizioComplicato');

$name = $_POST['name'];
$surname = $_POST['surname'];
$password = $_POST['password'];
$dataNascita = $_POST['date'];
$mail = $_POST['mail'];
$FiscalCode = $_POST['CF'];
$city = $_POST['city'];
$address = $_POST['address'];
$error = " ";
$errorMail = " ";


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $query_string = "SELECT email FROM Users WHERE email='$mail'";
    $res = $mysqli->query($query_string);
    if ($res->num_rows){
        $error = "*questa Mail è già registrata";
        $errorMail = $_POST['mail'];
    }
    else {
        createPerson($mysqli,$name,$surname,$dataNascita,$mail,$password,$FiscalCode,$city,$address);
        echo " account create";
        header("Location: index.php"); 
    }
}
?>  

<div>
    <form method="post" action="Registration.php" autocomplete="on"> 
        Name: <input type="text" name="name" required>
        <br><br>
        Surname:<input type="text" name="surname" required>
        <br><br>
        Date: <input type="date" name="date" required>
        <br><br>
        Mail: <input type="email" name="mail" value="<?php echo $errorMail;?>">
        <span style="color:red;"><?php echo $error;?></span>
        <br><br>
        Password: <input type="password" name="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
        title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"required>
        <br><br>
        FiscalCode: <input type="text" name="CF" pattern="^([A-Za-z]{6}[0-9lmnpqrstuvLMNPQRSTUV]{2}[abcdehlmprstABCDEHLMPRST]{1}[0-9lmnpqrstuvLMNPQRSTUV]{2}[A-Za-z]{1}[0-9lmnpqrstuvLMNPQRSTUV]{3}[A-Za-z]{1})|([0-9]{11})$"  required>
        <br><br>
        City: <input type="text" name="city" required>
        <br><br>
        Address: <input type="text" name="address" pattern="^[a-zA-Z0-9&#192;&#193;&#194;&#195;&#196;&#197;&#198;&#199;&#200;&#201;&#202;&#203;&#204;&#205;&#206;&#207;&#208;&#209;&#210;&#211;&#212;&#213;&#214;&#216;&#217;&#218;&#219;&#220;&#221;&#223;&#224;&#225;&#226;&#227;&#228;&#229;&#230;&#231;&#232;&#233;&#234;&#235;&#236;&#237;&#238;&#239;&#241;&#242;&#243;&#244;&#245;&#246;&#248;&#249;&#250;&#251;&#252;&#253;&#255;\.\,\-\/\']+[a-zA-Z0-9&#192;&#193;&#194;&#195;&#196;&#197;&#198;&#199;&#200;&#201;&#202;&#203;&#204;&#205;&#206;&#207;&#208;&#209;&#210;&#211;&#212;&#213;&#214;&#216;&#217;&#218;&#219;&#220;&#221;&#223;&#224;&#225;&#226;&#227;&#228;&#229;&#230;&#231;&#232;&#233;&#234;&#235;&#236;&#237;&#238;&#239;&#241;&#242;&#243;&#244;&#245;&#246;&#248;&#249;&#250;&#251;&#252;&#253;&#255;\.\,\-\/\' ]+$" required>
        <br><br>
        <input type="submit" value="Send">
        <input type="reset" value="Reset">
    </form>
</div>

    
</body>
</html>