<?php
//variable connection
$servername = "162.214.99.29";
$username = "Alan2";
$password = "qwerty123";
$dbname = "mts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//query
$sql = "SELECT NUMERO,NOMBRE FROM provee WHERE provee.`STATUS` = 1 AND TIPO = 4 AND LENGTH(NUMERO) >3 ORDER BY NOMBRE ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     echo  $row["NUMERO"]. "," . $row["NOMBRE"]. ",";
    }
  } else {
    echo "0 results";
  }
  $conn->close();
  //Desing by Alan Parra
?>