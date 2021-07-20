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
$Op = $_GET['OP'];
$notaParam = $_GET['valor'];
$id = "";
$nota = "";
$etapa = "";
$operario = "";
$AudOperario = "";
$notaNota = "";
$IdID = "";
$EtapaNota = "";
$ResiltEtapa = "";
//fin variables

//Inventario
$historial = "SELECT * FROM invctrlhistorial WHERE Nota = ".$notaParam." ORDER BY Etapa DESC LIMIT 1";
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
$sql = "SELECT InvCtrl,provee,NUMERO,ID FROM notas WHERE NUMERO = ".$notaParam;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $EtapaNota = $row["InvCtrl"];
   $IdID = $row["ID"];
   $notaNota = $row["NUMERO"];
   $Provee = $row["provee"];
  }

} else {
  echo "0 results ";
}

//Fin Notas

//validar operario
if ($Op == $operario) {
  $resultadoOP = $operario;  
} else {
  $resultadoOP = $Op;
}
//Fin operario validar

//validar nota
if ($nota != $notaParam) {
  $nota = $notaParam;
}

//validar etapa

if ($etapa != "" || $etapa != null) {
  if ($etapa >= 1 && $etapa <= 4) {
    $ResiltEtapa = $etapa."+1";
  }else if ($etapa >= 5 && $etapa <= 9){
    $ResiltEtapa = $etapa."+1";
  }else if ($etapa == 10){
    $ResiltEtapa = $etapa = "10";
  }
  //echo $ResiltEtapa;
  //echo "<br/>";
}
 else if($EtapaNota != "" || $EtapaNota != null) {
  if ($EtapaNota >= 1 && $EtapaNota <= 4) {
    $ResiltEtapa = $EtapaNota."+1";
  }else if ($EtapaNota >= 5 && $EtapaNota <= 9){
    $ResiltEtapa = $EtapaNota."+1";
  }else if ($EtapaNota == 10){
    $ResiltEtapa = $EtapaNota = "10";
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
$UPDATENOTAS = "UPDATE notas SET invctrl = ".$ResiltEtapa." WHERE ID = ".$IdID;
$INSERTINVNOTGA = "INSERT INTO invctrlhistorial (Nota, Etapa, Operario, AudOperario, AudFecha, AudHora) VALUES (".$nota.", ".$ResiltEtapa." , ".$resultadoOP.", ".$AudOperario.", '".$fechaActual."','".$horaActual."')";

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

  if ($EtapaNota >=4 && $EtapaNota <10) {
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
