<form action="" method="POST">
	<big><b>TASK LIST  ||</b></big> <i>things to do</i>
	<br><br>
	<input type="text" name="tasca" placeholder="introdueix la tasca">
	<input type="submit" name="enviar" value="Afegir">
</form>


<?php
  try {
    $hostname = "ec2-54-83-19-244.compute-1.amazonaws.com";
    $dbname = "d6re5i8fhaprmc";
    $username = "ypzqfahbluztpr";
    $pw = "05bbf4d60bbefe527c93cde077f456f10940ed147b04d8dd16fb1666754fbcde";
    $pdo = new PDO ("pgsql:host=$hostname;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

   if (isset($_POST['tasca'])) {
  	$crearTarea = "INSERT INTO task VALUES ('".$_POST['tasca']."')";
  	$resultado = $pdo->prepare($crearTarea);
    try {
      $resultado->execute();
    } catch (PDOException $e) {
      echo "Failed: " . $e->getMessage() . "\n";
    }
  } else {
      echo "Failed: " . $e->getMessage() . "\n";
  }
  $query = $pdo->prepare("SELECT * FROM task");
  $query->execute();
  $row = $query->fetch();

  echo "<ul>";
  while ( $rowaso ) {
    echo "<li>".$rowaso['tasca']."</li>";
    $row = $query->fetch();
  }
  echo "</ul>";
?>
