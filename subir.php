<?php
$tipo = $_FILES['archivo']['type'];
 
$tamanio = $_FILES['archivo']['size'];
 
$archivotmp = $_FILES['archivo']['tmp_name'];
 
$lineas = file($archivotmp);

$i=0;
 $mysqli = new mysqli("localhost", "root", "", "gema");
 if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
foreach ($lineas as $linea_num => $linea)
{ 
   if($i != 0) 
   { 
       $datos = explode(",",$linea);
      if ( count($datos)>=5)
      { 
        header('Location: index_prueba2.php');
        exit();
      }
       $correo = utf8_encode($datos[0]);
       $nombre = $datos[1];
       $apellido = utf8_encode($datos[2]);
       $estado = $datos[3];
 
       $q=$mysqli->query("select * from usuario where correo='$correo' and nombre='$nombre' and apellido='$apellido'");
       if (!$q->fetch_assoc())
       {
          $sql = mysqli_query($mysqli, "INSERT INTO usuario(correo,nombre,apellido,estado) VALUES('$correo','$nombre','$apellido','$estado')"); 
       }
   }
   $i++;
}
$q=$mysqli->query("select * from usuario where estado =1");
echo "<html>
        <head>
        <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;   
            
        }
        th{
          background-color:#C4C0C0; 
        }
        body
        {
          text-align:center;
        }
        </style>
        </head>
        <body>
        <div align='center'>
  <div style ='background-color:#C4C0C0;border: 1px solid ;color:white;width:80%;padding: 12px;'>
    GEMA SAS
  </div>
  <div align='center'  style='border: 1px solid ;width::80%;;padding: 12px;' >

    <a href='index_prueba.php'>Volver</a>
          <form>
            <div align='center'>
            <br>Usuarios activos</br>
              <table style='width:50%' >
                <tr>
                  <th>Correo</th>
                  <th>Nombre</th> 
                  <th>Apelido</th>
                </tr>";
                while($r=$q->fetch_assoc()) {
               echo " <tr>
                  <td>".$r['correo']."</td>
                  <td>".$r['nombre']."</td> 
                  <td>".$r['apellido']."</td>                
                </tr>";
                }
              echo "
              </table>

          </form>
          </div>";
$q=$mysqli->query("select * from usuario where estado =2");
echo "
          <form>

          <div align='center'>
          <br>Usuarios inactivos</br>
              <table style='width:50%''>
                <tr>
                  <th>Correo</th>
                  <th>Nombre</th> 
                  <th>Apelido</th>
                </tr>";
                while($r=$q->fetch_assoc()) {
               echo " <tr>
                  <td>".$r['correo']."</td>
                  <td>".$r['nombre']."</td> 
                  <td>".$r['apellido']."</td>                
                </tr>";
                }
              echo "
              </table>

          </form>
          </div>";
    $q=$mysqli->query("select * from usuario where estado =3");
    echo "<form>
          <div align='center'>
          <br>Usuarios en espera</br>
              <table style='width:50%''>
                <tr>
                  <th>Correo</th>
                  <th>Nombre</th> 
                  <th>Apelido</th>
                </tr>";
                while($r=$q->fetch_assoc()) {
               echo " <tr>
                  <td>".$r['correo']."</td>
                  <td>".$r['nombre']."</td> 
                  <td>".$r['apellido']."</td>                
                </tr>";
                }
              echo "
              </table>

          </form>
          </div>           
    </div>
</div>
        </body>
      </html>
";
?>