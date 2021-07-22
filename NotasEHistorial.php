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

//Hora y Fecha Proceso
date_default_timezone_set("America/Mexico_City");
$fechaActual = date('Y-m-d');
$horaActual = date('H:i:s');
//Fin Hora Fecha

//Variables
$Param = $_GET['OP'];
$Param = $_GET['valor'];
$Param = "";
$Param = "";
$Param = "";
$Param = "";
$Param = "";
$Param = "";
$Param = "";
$Param = "";
$Param = "";
//fin variables

//Inventario
$historial = "SELECT * FROM table WHERE Nota = ".$notaParam." ORDER BY Etapa DESC LIMIT 1";
$result = $conn->query($historial);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row["Id"];
    $nota = $row["Nota"];
    $etapa = $row["Etapa"];
    $operario = $row["Operario"];
    $AudOperario = $row["AudOperario"];  
  }

} else {
  echo "0 results";
}
//fin Inventario

//Notas 
$sql = "SELECT value1,2,3,4 FROM table WHERE NUMERO = ".$notaParam;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $param = $row["Valor"];
   $param = $row["Valor"];
   $param = $row["Valor"];
   $param = $row["Valor"];
  }

} else {
  echo "0 results ";
}

//Fin Notas

//validar operario
if ($Op == $param) {
  $resultadoOP = $operario;  
} else {
  $resultadoOP = $Op;
}
//Fin operario validar

//validar nota
if ($param != $param) {
  $param = $param;
}

//validar etapa

if ($param != "" || $param != null) {
  if ($param >= 1 && $param <= 4) {
    $param = $param."+1";
  }else if ($param >= 5 && $param <= 9){
    $param = $param."+1";
  }else if ($param == 10){
    $param = $param = "10";
  }
  //echo $ResiltEtapa;
  //echo "<br/>";
}
 else if($param != "" || $param != null) {
  if ($param >= 1 && $param <= 4) {
    $param = $param."+1";
  }else if ($param >= 5 && $param <= 9){
    $param = $param."+1";
  }else if ($param == 10){
    $param = $param = "10";
  }
  //echo $ResiltEtapa;
  //echo "<br/>";
}
else
{
  echo "Error 401";
}
//Fin Etapa

//Validar AudOperario
if ($AudOperario == "") {
  $AudOperario = "4";
}
//Fin AudOperario

//querys
$UPDATENOTAS = "UPDATE value SET table = ".$ResiltEtapa." WHERE ID = ".$IdID;
$INSERTINVNOTGA = "INSERT INTO value (Valor, Valor, Valor, Valor, Valor, Valor) VALUES (".$param.", ".$param." , ".$param.", ".$param.", '".$param."','".$param."')";

//echo $UPDATENOTAS;
//echo "<br/>";
//echo $INSERTINVNOTGA;

//bloque Try Catch
try {
  
if ($notaNota = $notaParam || $nota = $notaParam) {
  
  //Update
  if ($conn->query($UPDATENOTAS) == TRUE) {
    echo "200";
  } else {
    echo "Error: 300"  . "<br/>" . $conn->error;
  }
  //Update fin

  //Insert 

  if ($Param >=4 && $Param <10) {
    if ($conn->query($INSERTINVNOTGA) == TRUE) {
      echo "200";
    } else
    {
      echo "Error: 300" . "<br>/" . $conn->error;
    } 
  }else{
      //no hacer nada
  }
  //Insert fin

} else {
  echo "Error de notas";
}

} catch (\Throwable $th) {
  echo $th->getMessage();
}

$conn->close();
//Desing by Alan Parra
