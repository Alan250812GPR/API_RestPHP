<?php
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

$Notass = $_GET['valor'];
$etapaConsulta = "";

$sql = "SELECT * FROM invctrlhistorial WHERE Nota = " . $Notass . " ORDER BY Etapa DESC LIMIT 1 ";
$result = $conn->query($sql);

$sql2 = "SELECT InvCtrl,provee,NUMERO FROM notas WHERE NUMERO = " . $Notass;
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    "Id:" . $row["Id"] . ",Nota:" . $row["Nota"] . ",Etapa:" . $row["Etapa"] . ",Operario:" . $row["Operario"] . "AudOperario:" . $row["AudOperario"] . "<br>";

    switch ($row["Etapa"]) {
      case "1":
        $etapaConsulta = "Crear Nota Destajo";
        break;
      case "2":
        $etapaConsulta = "Imprimir Nota Destajo";
        break;
      case "3":
        $etapaConsulta = "Seperar Biseles y Provee 3999";
        break;
      case "4":
        $etapaConsulta = "Seperar Cristales";
        break;
      case "5":
        $etapaConsulta = "Asignar Operario";
        break;
      case "6":
        $etapaConsulta = "Entregar a Operario";
        break;
      case "7":
        $etapaConsulta = "Recibir de Operario ( Calidad )";
        break;
      case "8":
        $etapaConsulta = "Calidad - Revisar";
        break;
      case "9":
        $etapaConsulta = "Pasar a Almacen Inventario";
        break;
      case "10":
        $etapaConsulta = "Generar pago a Operario";
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
    "Nota:" . $row["NUMERO"] . ",Etapa:" . $row["InvCtrl"] . ",Operario:" . $row["provee"] . "<br>";

    //switch para nombre de la etapa
    switch ($row["InvCtrl"]) {
      case "1":
        $etapaConsulta = "Crear Nota Destajo";
        break;
      case "2":
        $etapaConsulta = "Imprimir Nota Destajo";
        break;
      case "3":
        $etapaConsulta = "Seperar Biseles y Provee 3999";
        break;
      case "4":
        $etapaConsulta = "Seperar Cristales";
        break;
      case "5":
        $etapaConsulta = "Asignar Operario";
        break;
      case "6":
        $etapaConsulta = "Entregar a Operario";
        break;
      case "7":
        $etapaConsulta = "Recibir de Operario ( Calidad )";
        break;
      case "8":
        $etapaConsulta = "Calidad - Revisar";
        break;
      case "9":
        $etapaConsulta = "Pasar a Almacen Inventario";
        break;
      case "10":
        $etapaConsulta = "Generar pago a Operario";
        break;
      default:
        //Codigo despues para errores
        break;
    }

    //Generacion de informacion que pasa al telefono
    echo "Etapa: " . $row["InvCtrl"]." ".$etapaConsulta;
    echo ", ";
    echo "Operario: " . $row["provee"];
  }
} else {
  echo "0 Results";
}
$conn->close();
//Desing by Alan Parra
