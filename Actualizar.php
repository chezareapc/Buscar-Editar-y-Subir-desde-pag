<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insetar Datos</title>
  </head>
  <body>

    <?php
        //$busqueda=$_GET["buscar"];
    $cod=$_GET['c_art'];
    $sec=$_GET['seccion'];
    $nom_a=$_GET['n_art'];
    $pre=$_GET['precio'];
    $fec=$_GET['fecha'];
    $imp=$_GET['importado'];
    $pais_o=$_GET['p_orig'];

    require ('datosConexionBD.php');
// Yudith 01510144091000199239
  $conexion= mysqli_connect($db_host,$db_usuario,$db_contra="");

    if (mysqli_connect_errno()) {
      echo "Falllo al conectar con la base de datos";

      exit();}
    mysqli_select_db($conexion,$db_nombre) or die ("No se Encuentra la BBDD");
                            //--db_nombre=php2mascotas
    mysqli_set_charset($conexion,'utf8');

    $consulta="UPDATE PRODUCTOS SET
    CODIGOARTICULO='$cod',
    SECCION='$sec',
    NOMBREARTICULO='$nom_a',
    PRECIO='$pre',
    FECHA='$fec',
    IMPORTADO='$imp',
    PAÍSDEORIGEN='$pais_o' WHERE CODIGOARTICULO='$cod'  ";

    $resultado=mysqli_query($conexion,$consulta);

    if ($resultado==false) {
      echo "Error en la Consulta";
    }else {
      echo "Registro guardado <br /><br />";
      echo "<table><tr>$cod<td></td></tr>";
      echo "<tr><td>$sec</td></tr>";
      echo "<tr><td>$nom_a</td></tr>";
      echo "<tr><td>$sec</td></tr>";
      echo "<tr><td>$pre</td></tr>";
      echo "<tr><td>$fec</td></tr>";
      echo "<tr><td>$imp</td></tr>";
      echo "<tr><td>$pais_o</td></tr></table>";

    }

    mysqli_close($conexion);
     ?>
  </body>
</html>
