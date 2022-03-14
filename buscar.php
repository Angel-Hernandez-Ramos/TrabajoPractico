<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CONTROL</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<div id="wrap">
  <div id="masthead">
    <h1>CONTROL / RESULTADOS DE BUSQUEDA </h1>
    <div id="menucontainer">
      <div id="menunav">
        <ul>
          <li><a href="index.php"><span>INICIO</span></a></li>
          <li><a href="captura.php"><span>CAPTURA</span></a></li>
          <li><a href="Listado.php" class="current"><span>LISTADO</span></a></li>
          <li><a><span>EVALUACION</span></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div id="container">
    <div id="sidebar">
      <h2>BUSCAR PROSPECTOS</h2>
      <form action="buscar.php" method="post">
        <fieldset>
        <legend></legend>
        <div> <span>
          <label for="txtsearch"> Buscar:<img src="images/magnify.png" alt="search" /></label>
          </span> <span>
          <input type="text" value="" name="txtsearch" title="Text input: search" id="txtsearch" size="25" />
		  <br> 
		  <input type="submit" name="Enviar" value="Enviar">
		  <br>
          </span> </div>
        </fieldset>
      </form>
      <p>&nbsp;</p>
    </div>
    <div id="content">
      <h2>Busqueda: </h2>
      <p>aqui..</p>
	  <?PHP
	    $bus=$_REQUEST['txtsearch'];
            echo "El dato a buscar es: $bus <br>"; 
      
     $link=mysqli_connect("localhost","root","");
      mysqli_select_db($link,"prospectos");

      $result=mysqli_query($link,"select * from prospecto where nombre like '%$bus%'"); 
        echo "<table border='1'>";
       echo "<TR><TD> Id</TD><TD> nombre </TD>
         <TD> Apellido 1</TD><TD>Apellido 2</TD><TD> Telefono </TD><TD> RFC </TD> <TD> Estado </TD></TR>";


      while ($row=mysqli_fetch_array($result))
      {
        $id=$row['id_prospecto'];
      $nom=$row['nombre'];
      $p_ap=$row['p_apellido'];
      $s_ap=$row['s_apellido'];
      $num=$row['numero'];
	  $col=$row['colonia'];
	  $c_p=$row['c_p'];
	  $tel=$row['telefono'];
	  $rfc=$row['RFC'];
	  $docs=$row['docs'];
	  $stat=$row['status'];
    if($stat==0){
      $estados = "Enviado";
    }else{
      if($stat==1){
    $estados = "Aceptado";
    }else{
     $estados = "Rechazado";
    }
    }

      echo"<TR><TD>$id</TD><TD><A href='captura2.php?nom=$nom'>$nom</A></TD><TD>$p_ap</TD><TD>$s_ap</TD> <TD>$tel</TD> <TD>$rfc</TD> <TD>$estados</TD></TR>";   
      }
      mysqli_free_result($result); 
      mysqli_close($link); 
      echo"</table>";
      
   ?>
      <p>&nbsp;</p>
    </div>
  </div>
</div>
<div id="footer"><ul>
          <li><a href="index.php" class="current"><span>SALIR</span></a></li>
        </ul></div>
</body>
</html>
