<?php //connessione al DB 
$mysqli = new mysqli ('localhost', 'root', 'root', 'corso13'); //opzionali i parametri numero porta e socket

if ($mysqli-> connect_error){
  die('errore di connessione (codice errore'. $mysqli->connect_errno . ') messaggio errore' . $mysqli->connect_error); //die = forza l'interruzione dell'esecuzione 
}else{
  echo 'connesso' ."\n". $mysqli->host_info . "\n";
}
$query_string1 = "USE corso13"; //lavora con il db corso13, perchè si possono usare più db e si usa quindi la notazione puntata
$mysqli->query($query_string1);//esegui query

$query_string = "CREATE TABLE persone ( id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(15) NOT NULL,password VARCHAR(140) NOT NULL)"; //crea tabella persone
// $res = $mysqli->query($query_string);//esegui query
// if ($res){
//     echo "inserito";
//   }
//   else echo "errore" . $mysqli->error;

$password = 'MARIOSEITU';
$password_hash = hash('sha256',$password); //crittografia password
$user_id = $mysqli->insert_id;
$query_string = "INSERT INTO persone(id,name , password) VALUES ($user_id,'pollo','$password_hash')";//nuovo utente
//$res1 = $mysqli->query($query_string);

$query_stringRow = $query->num_rows; // numero di row
//fetch_all()restituisce array con i valori della table 
echo $query->num_rows . "numero rows"



// if ($res1){
//     echo "inserito";
//   }
//   else echo "errore" . $mysqli->error;


?>