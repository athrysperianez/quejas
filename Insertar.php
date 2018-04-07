<?php

if(isset($_POST['x'])){
session_start();
$link = mysqli_connect("localhost", "root", "", "distritos");
$sqlDistrito = mysqli_query($link, "SELECT Id FROM mapa WHERE Nombre = '".$_SESSION['distrito']."'");
$result = mysqli_fetch_assoc($sqlDistrito);
$sql = mysqli_query($link, "INSERT INTO `quejas`(`IdDistrito`,`Tipo`, `Sexo`, `Descripcion`, `X`, `Y`) VALUES (".$result['Id'].",'".$_POST['tipo']."','".$_POST['sexo']."','".$_POST['descripcion']."',".$_POST['x'].",".$_POST['y'].")");
header("Location: index.php");
}else if(isset($_GET['x']) && isset($_GET['y'])){
echo "<form method='POST' action='#' name='formularo'>Tipo de queja: <select name='tipo'>
  <option value='Medioambiental'>Medioambiental</option>
  <option value='Social'>Social</option>
  <option value='Conflictiva'>Conflictiva</option>
  </select></br>
  </br>
  Sexo:</br>
  <input type='radio' name='sexo' value='M' checked> Masculino</br>
  <input type='radio' name='sexo' value='F'> Femenino</br>
  </br>
  Descripcion: </br><input type='text' name='descripcion'>Introduzca la descripcion de su queja aqui</textarea>
  <input type='text' name='x' value='".$_GET['x']."' hidden>
  <input type='text' name='y' value='".$_GET['y']."' hidden>
  <input type='submit'>";
    
}

