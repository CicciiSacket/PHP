<?php

function connectDB($host,$user,$passw){
    $mysqli = new mysqli ($host,$user,$passw);
    if ($mysqli-> connect_error){
        die('errore di connessione (codice errore'. $mysqli->connect_errno . ') messaggio errore' . $mysqli->connect_error); 
    }else{
        return $mysqli;
    }
}

function useDB($mysqli,$nameDB){
    $query_string = "USE $nameDB";
    $res = $mysqli->query($query_string);
}

function login($mysqli,$mail,$password){
    // $password_hash = hash('sha256',$password);
    $query_string = "SELECT * FROM persona WHERE mail='$mail' AND password='$password'";
    $res = $mysqli->query($query_string);
    if ($res->num_rows){
        $utenti = $res->fetch_all(MYSQLI_ASSOC);
        foreach ($utenti as $utente) {
            if ($mail === $utente['email']) {
                session_start();
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
    header("Location: Login.php");
}

?>