<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Marcar</title>
  </head>
  <body>
      <form method="get" action="Insertar.php">
    <?php

    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "distritos";
    $conn = new mysqli($servername, $user,$password, $dbname);
    $sql = "SELECT Id, Nombre, Imagen FROM mapa";
    $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            if ($_GET['destino']==$row["Nombre"]) {
            echo '<input id="image" type="image" src="'.$row["Imagen"].'">';
            }

          }
        } else {
          echo "0 results";
        }

    $conn->close();
    session_start();


     ?>
          <input type="submit">
      </form>
  </body>
</html>