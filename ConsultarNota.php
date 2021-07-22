<?php
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "DB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$Notass = $_GET['valor'];
$et = "";

$sql = "SELECT * FROM tabla WHERE Nota = " . $Param . " ORDER BY valor DESC LIMIT 1 ";
$result = $conn->query($sql);

$sql2 = "SELECT valor,2,3 FROM tabla WHERE NUMERO = " . $Param;
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    "Id:" . $row["valor"] . ",valor:" . $row["valor"] . ",valor:" . $row["valor"] . ",valor:" . $row["valor"] . "valor:" . $row["valor"] . "<br>";

    switch ($row["valor"]) {
      case "1":
        //pasos
        break;
      case "2":
        //pasos
        break;
      case "3":
        //pasos
        break;
      case "4":
        //pasos
        break;
      case "5":
        //pasos
        break;
      case "6":
        //pasos
        break;
      case "7":
        //pasos
        break;
      case "8":
        //pasos
        break;
      case "9":
        //pasos
        break;
      case "10":
        //pasos
        break;
      default:
        //Codigo despues para errores
        break;
    }

    echo "Etapa: " . $row["Etapa"]." ".$etapaConsulta;
    echo ", ";
    echo "Operario: " . $row["Operario"];
  }
} else if ($result2->num_rows > 0) {
  while ($row = $result2->fetch_assoc()) {
    "valor:" . $row["valor"] . ",valor:" . $row["valor"] . ",valor:" . $row["valor"] . "<br>";

    //switch para nombre de la etapa
    switch ($row["valor"]) {
      case "1":
        //pasos
        break;
      case "2":
        //pasos
        break;
      case "3":
        //pasos
        break;
      case "4":
        //pasos
        break;
      case "5":
        //pasos
        break;
      case "6":
        //pasos
        break;
      case "7":
        //pasos
        break;
      case "8":
        //pasos
        break;
      case "9":
        //pasos
        break;
      case "10":
        //pasos
        break;
      default:
        //Codigo despues para errores
        break;
    }

    //Generacion de informacion que pasa al telefono
    echo "valor: " . $row["valor"]." ".$et;
    echo ", ";
    echo "valor: " . $row["valor"];
  }
} else {
  echo "0 Results";
}
$conn->close();
//Desing by Alan Parra
