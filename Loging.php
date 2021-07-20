<?php
//Variables base de datos
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "DB";

//Hora y Fecha Proceso
date_default_timezone_set("America/Mexico_City");
$fechaActual = date('Y-m-d');
$horaActual = date('H:i:s');
//Fin Hora Fecha

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//variables de comparacion
$usuarios = $_GET['User'];
$Passwo = $_GET['Password'];
$UsAsign = "";
$PsAsign = "";

//Query para extraer usuario y contraseña
$sql = "SELECT * FROM usuarios WHERE USUARIO = '".$usuarios. "' AND CLAVE = '".$Passwo."'";
$result = $conn->query($sql); //ejecucion del query

//Bloque try catch
try {
    //verificamos que exista un resultado
    if ($result->num_rows > 0) {
        //recorremos el resultado y lo asignamos a una variable
        while($row = $result->fetch_assoc()) {
        $UsAsign = $row["USUARIO"];
        $PsAsign = $row["CLAVE"];
        }

        //comparamos los datos introducidos desde la aplicacion y los extraidos de la DB
        if ($UsAsign == $usuarios && $PsAsign == $Passwo) {
            echo "200";
        } else {
            echo "300";
        }

      }else{
          echo "500";
      }
} catch (\Throwable $th) {
    echo $th->getMessage();
}

//bloque de agregado de log pendiente
//$LogInsert "INSERT INTO Log (dato,dato,dato) VALUES ('".$UsAsign."', '".$fechaActual."', '".$horaActual."')";
/*
if ($conn->query($LogInsert) == TRUE) {
    echo "200";
  } else {
    echo "Error: 300" . "<br>/" . $conn->error;
  }*/

  $conn->close(); //cierre de conexion
//Desing by Alan Parra
?>
