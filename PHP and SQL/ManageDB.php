<?php  


function connectDB($host,$user,$passw){
    $mysqli = new mysqli ($host,$user,$passw);
    if ($mysqli-> connect_error){
        die('errore di connessione (codice errore'. $mysqli->connect_errno . ') messaggio errore' . $mysqli->connect_error); 
    }else{
        return $mysqli;
    }
}

function createDB($mysqli,$nameDB){
    $query_string= "CREATE DATABASE " . $nameDB;
    $res = $mysqli->query($query_string);
    return $res;
}

function useDB($mysqli,$nameDB){
    $query_string = "USE $nameDB";
    $res = $mysqli->query($query_string);
    // if ($res) {
    //     echo "\nusi il db selezionato\n";
    // } else {
    //     echo $mysqli->error;
    // }
}

function createTablePerson($mysqli){
    $query_string = "CREATE TABLE Users (id_user INT (10) NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(15) NOT NULL , surname VARCHAR(15) NOT NULL , date DATE, email VARCHAR(35) NOT NULL UNIQUE , password VARCHAR(255) NOT NULL , FiscalCode VARCHAR(16) NOT NULL UNIQUE , City VARCHAR(25) NOT NULL , Address VARCHAR(35) NOT NULL  )";
    $res = $mysqli->query($query_string);
    if ($res) {
        echo "\ncreate table Users\n";
    } else {
        echo "\n".$mysqli->error."\n";
    }
}

function createTableAccess($mysqli){
    $query_string = "CREATE TABLE Access (id_access INT (10) NOT NULL PRIMARY KEY AUTO_INCREMENT, date TIMESTAMP default CURRENT_TIMESTAMP , id_user INT (10) NOT NULL REFERENCES Users (id_user))";
    $res = $mysqli->query($query_string);
    if ($res) {
        echo "\ncreate table Access\n";
    } else {
        echo "\n".$mysqli->error."\n";
    }
}

function createTableFavourites($mysqli){
    $query_string = "CREATE TABLE Favourites (id INT (10) NOT NULL PRIMARY KEY AUTO_INCREMENT, id_products INT (10) NOT NULL REFERENCES Products (id_products) , id_user INT (10) NOT NULL REFERENCES Users(id_user) )";
    $res = $mysqli->query($query_string);
    if ($res) {
        echo "\ncreate table Favourites\n";
    } else {
        echo "\n".$mysqli->error."\n";
    }
}

function createTableProducts($mysqli){
    $query_string = "CREATE TABLE Products (id_products INT (10) NOT NULL PRIMARY KEY AUTO_INCREMENT, name_products VARCHAR(35) NOT NULL, price FLOAT)";
    $res = $mysqli->query($query_string);
    if ($res) {
        echo "\ncreate table Products\n";
    } else {
        echo "\n".$mysqli->error."\n";
    }
}

function createPerson($mysqli,$name,$surname,$dataNascita,$email,$password,$FiscalCode,$city,$address){
    $password_hash = hash('sha256',$password);
    $query_string = 
    "INSERT INTO Users (name, surname, date, email, password, FiscalCode, City, Address) 
    VALUES ('$name','$surname','$dataNascita','$email','$password_hash','$FiscalCode','$city','$address')";

    $res = $mysqli->query($query_string);
    if ($res) {
        echo "\nuser insert into db\n";
    } else {
        echo "\n".$mysqli->error."\n";
    }
}

function readPerson($mysqli,$namePerson){
    $query_string = "SELECT id_user, name FROM Users WHERE name='$namePerson'";
    $res = $mysqli->query($query_string);
    if ($res) {
        echo "\nreturn this person\n";
    } else {
        echo "\n".$mysqli->error."\n";
    }
    return $res;
}

function editPerson($mysqli,$id_users,$password){//la cosa che qualcuno modifica più spesso è la password..
    $password_hash = hash('sha256', $password);
    $query_string = "UPDATE Users SET password='$password_hash' WHERE id_user='$id_users'";
    $res = $mysqli->query($query_string);
    if ($res) {
        echo "\npassword changed\n";
    } else {
        echo "\n".$mysqli->error."\n";
    }

}

function createAccess($mysqli,$id_user){

    $query_string = "INSERT INTO Access (id_user) VALUES ($id_user)";
    $res = $mysqli->query($query_string);
    if ($res) {
        echo "\nAccess insert into DB\n";
    } else {
        echo "\n".$mysqli->error."\n";
    }

}

function createProduct($mysqli,$name_products,$price){
    $query_string = "INSERT INTO Products (name_products,price) VALUES ('$name_products','$price')";
    $res = $mysqli->query($query_string);
    if ($res) {
        echo "\nproduct insert into db\n";
    } else {
        echo "\n".$mysqli->error."\n";
    }
}

function addFavourite($mysqli,$id_product,$id_user){
    $query_string = "INSERT INTO Favourites (id_products, id_user) VALUES ($id_product,'$id_user')";
    $res = $mysqli->query($query_string);
    if ($res) {
        echo "\nFavourite insert into DB\n";
    } else {
        echo "\n".$mysqli->error."\n";
    }
}

function removeFavourite($mysqli,$id_product){
    $query_string = "DELETE FROM Favourites WHERE id_products=$id_product ";
    $res = $mysqli->query($query_string);
    if ($res) {
        echo "\nFavourite remove from DB\n";
    } else {
        echo "\n".$mysqli->error."\n";
    }
}

function login($mysqli,$mail,$password){
    $password_hash = hash('sha256',$password);
    $query_string = "SELECT * FROM Users WHERE email='$mail' AND password='$password_hash'";
    $res = $mysqli->query($query_string);
    if ($res->num_rows){
        $utenti = $res->fetch_all(MYSQLI_ASSOC);
        foreach ($utenti as $utente) {
            if ($mail === $utente['email']) {
                session_start();
                $_SESSION['utente'] = $utente['name'];
                $_SESSION['userID'] = $utente['id_user'];
            }
        }
        header("Location: Home.php");  /* Redirect browser */  

    } else {
        "Accesso rifiutato". $mysqli->error;
    }
}

function logout($mysqli){
    session_destroy();
    $mysqli->close();  
    header("Location: index.php");
}

function ListProductsFavouritesForSingleID($mysqli,$id_user){
    $query_string = "SELECT * FROM Favourites WHERE id_user='$id_user'";
    $res = $mysqli->query($query_string);
    while($row = mysqli_fetch_assoc($res)) {
        echo "<li>"."id: " . $row["id"]. " - id_products: " . $row["id_products"] . "<br>" . "</li>";
    }
}
   
function ListAccessForSingleID($mysqli,$id_user){
    $query_string = "SELECT * FROM Access WHERE id_user='$id_user'";
    $res = $mysqli->query($query_string);
    while($row = mysqli_fetch_assoc($res)) {
        echo "<li>". "id_access: " . $row["id_access"]. " -date: " . $row["date"] . " -id_user: " . $row["id_user"]."<br>". "</li>";
    }
}

function totalProducts($mysqli){
    $query_string = "SELECT * FROM Products";
    $res = $mysqli->query($query_string);
    while($row = mysqli_fetch_assoc($res)) {
        echo "<li>". "id: " . $row["id_products"]. " - name: " . $row["name_products"] . " - price: " . $row["price"] ."<br>" . "</li>";
    }
}

function mailExist($mysqli,$mail){
    $query_string = "SELECT email FROM Users WHERE email='$mail'";
    $res = $mysqli->query($query_string);
    if ($res->num_rows){
        $error = "*questa Mail è già registrata";
        $errorMail = $_POST['mail'];
    }
}
?> 