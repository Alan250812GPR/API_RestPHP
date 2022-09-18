<?php
//variable connection
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//query
$sql = "SELECT NUM,NOM FROM provee WHERE pro.NU = valor OR pro.NU = valor OR pro.NU = valor OR pro.NU = valor OR pro.NU = valor OR pro.NU = valor OR pro.NU = valor OR pro.NU = valor or pro.`STATUS` = 1 AND TI = 4 AND LENGTH(NUM) >3  ORDER BY NOM ASC;";

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
