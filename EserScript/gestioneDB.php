<?php

$mysqli = new mysqli('localhost', 'root', 'root');
if ($mysqli->connect_error) {
    die('Errore di connessione (codice errore: ' . $mysqli->connect_errno . ') messaggio errore: ' . $mysqli->connect_error);
} else {
    echo 'Connesso. ' . $mysqli->host_info . "\n";
}

$query_string = "CREATE DATABASE corso14";
$mysqli->query($query_string);

$query_string = "USE corso14";
$mysqli->query($query_string);

$query_string = "CREATE TABLE persone ( `id` INT(10) NOT NULL AUTO_INCREMENT , PRIMARY KEY (`id`) ,
`nome` VARCHAR(50) NOT NULL ,
`cognome` VARCHAR(50) NOT NULL ,
`eta` TINYINT(3) NOT NULL ,
`email` VARCHAR(50) NOT NULL ,
`password` VARCHAR(256) NOT NULL )";

//$password = $_POST['password'];

$nome = "Ciccio2";
$cognome = "Grasso2";
$eta = 32;
$email = "c.grasso@stevebojs.academy";
$password = "La mia password";
$password_hash = hash('sha256', $password);

$query_string = "INSERT INTO persone (`nome`, `cognome`, `eta`, `email`, `password`) VALUES
('$nome', '$cognome', '$eta', '$email', '$password_hash')";

$res = $mysqli->query($query_string);

if ($res) {
echo "creato utente";
} else {
die('Errore di connessione:' . $mysqli->error);
}

$id_new_user = $mysqli->insert_id;

$query_string = "INSERT INTO accessi (user_id) VALUES ( '$id_new_user')";
$res = $mysqli->query($query_string);
if ($res) {
echo "creato accesso";
} else {
die('Errore di connessione:' . $mysqli->error);
}


$mail = "g.grasso@stevebojs.academy";
$password = hash('sha256', "La mia password");
$query_string = "SELECT nome,cognome,eta FROM persone WHERE email = '$mail'";
$res = $mysqli->query($query_string);
echo "\n Ho trovato, numero di utenti: " . $res->num_rows;

if ($res->num_rows) {
    echo "\nAccesso consentito";
    $utenti = $res->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Accesso rifiutato";
}

foreach ($utenti as $utente) {
    echo "\n\n" . $utente['nome'] . " " . $utente['cognome'] . " " . $utente['eta'];
}

echo "<br>Modifica Utente con id 3\n\n\n";
$query_string = "UPDATE persone SET nome = 'Mirko', cognome = 'Mirko' WHERE  id = '3'";
$res = $mysqli->query($query_string);
echo "Righe modificate: " . $mysqli->affected_rows . "<br />";

echo "<br>Elimina Utente con id 3\n\n\n";
$query_string = "DELETE FROM persone WHERE id = 3";
$res = $mysqli->query($query_string);
echo "Righe eliminate: " . $mysqli->affected_rows . "<br />";
