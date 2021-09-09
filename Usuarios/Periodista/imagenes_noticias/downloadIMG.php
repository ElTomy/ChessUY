<?php
include '../../../servidor.php';

$tipo=$_POST['tipo'];

if($tipo==1){
  $sql = "SELECT ImagenPrincipal FROM datosProyecto WHERE idProyecto ='".$idproyecto."'";
  $result = $mysqli->query($sql);
  $rr = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $url=$rr['ImagenPrincipal'];
  //
  
  $pos = strrpos($url, "/");
  $url2='';
  if ($pos !== false) { 
      $url2= substr($url, $pos+1);
  }
  echo '<div class="img-wrap" ><span class="close" onclick="borramosprincipal(\''.$url2.'\')">&times;</span>';
  echo "<img src='".$url."' width='350' height='196' data-id='".$url2."'></div>";
  //
  
}else{
  if($tipo==2){
    $sql = "SELECT Banner FROM datosProyecto WHERE idProyecto ='".$idproyecto."'";
    $result = $mysqli->query($sql);
    $rr = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $url=$rr['Banner'];
    $pos = strrpos($url, "/");
    $url2='';
    if ($pos !== false) { 
        $url2= substr($url, $pos+1);
    }
    echo '<div class="img-wrap" ><span class="close" onclick="borramosbanner(\''.$url2.'\')">&times;</span>';
    echo "<img src='".$url."' width='600' height='100' data-id='".$url2."'></div>";
    
  }
  else{
    $sql = "SELECT * FROM imagenes WHERE idProyecto ='".$idproyecto."';";
    $result = $mysqli->query($sql);
    
    while($row = $result->fetch_array()){
      $url=$row['url'];
      $pos = strrpos($url, "/");
      $url2='';
      if ($pos !== false) { 
          $url2= substr($url, $pos+1);
      }
      echo '<div class="img-wrap" ><span class="close" onclick="borramos(\''.$url2.'\')">&times;</span>';
      echo "<img src='".$url."' width='350' height='196' data-id='".$url2."'></div>";
     }
  }
}


?>  
