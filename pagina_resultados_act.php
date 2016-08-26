<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>bases de daots</title>
<style>
table {
width:50%;
border: 1px dotted #d4324f;
margin: auto;;
}
td{
  text-align: center;
}
</style>
  </head>
  <body>
    <?php

    $busqueda=$_GET["buscar"];

    require ("datosConexionBD.php");

    $conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

  if (mysqli_connect_errno()) {
echo "Error al conectar con la bases de datos";

exit();
  }
mysqli_select_db($conexion,$db_nombre) or die ("no se encuentra la BBDD");

mysqli_set_charset($conexion, "utf8");

  $query="SELECT * FROM PRODUCTOS WHERE NOMBREARTICULO LIKE '%$busqueda%'";

  $resultado=mysqli_query($conexion,$query);


  while ($fila=mysqli_fetch_array($resultado, MYSQL_ASSOC)) {



  //echo "<table><tr><td>";
  echo "<form action='Actualizar.php' method='get'>";
  echo "<input type='text' name='c_art'     value='". $fila['CODIGOARTICULO']. "'> <br>";
  echo "<input type='text' name='seccion'     value='". $fila["SECCION"]       . "'> <br>";
  echo "<input type='text' name='n_art'   value='". $fila['NOMBREARTICULO']. "'> <br>";
  echo "<input type='text' name='precio' value='". $fila['PRECIO']        . "'> <br>";
  echo "<input type='text' name='fecha'    value='". $fila['FECHA']         . "'> <br>";
  echo "<input type='text' name='importado'    value='". $fila['IMPORTADO']     . "'> <br>";
  echo "<input type='text' name='p_orig'    value='". $fila['PAÍSDEORIGEN']  . "'> <br>";


  echo "<input type='submit' name='envaindo' value='Actualizar'>";
  echo "</form>";

}
  mysqli_close($conexion);

     ?>
  </body>
</html>
