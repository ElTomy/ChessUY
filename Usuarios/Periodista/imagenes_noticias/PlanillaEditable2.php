<?php
   
           include 'verificosesion.php';
    ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar Proyecto | Expoeduca</title>
<!-- 
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="tinymce/tinymce.min.js"></script>
   

    <script src="../js/functionPlanillaEditable.js"></script>
    

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../css/styles.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap"
      rel="stylesheet"
    />
  </head>

  <?php
  include '../Form/conexion.php';  
   $sql = "SELECT TipoUsuario FROM usuario where usuario='". $_SESSION['Usuario']."'";   
   $result = $mysqli -> query($sql);   
   $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);   
   if(isset($ss['TipoUsuario'])){      
     if($ss['TipoUsuario']==2){       
       $aprobar = "display: none;";     
      }     
    }
    //cuando es alumno no muestra el boton de aprobar proyecto

   $idproyecto = $_POST['id'];

    $sql = "SELECT * FROM datosProyecto WHERE idProyecto ='".$idproyecto."'";
    $resultaa = $mysqli->query($sql);
    $aa =mysqli_fetch_array($resultaa, MYSQLI_ASSOC);

    $sql = "SELECT * FROM videos WHERE idProyecto ='".$idproyecto."'";
    $result = $mysqli->query($sql);
    $vv = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $banner = $aa['Banner'];
    $titulo = $aa['Titulo'];
    $introduccion = $aa['Introduccion'];
    $descripcion = $aa['Descripcion'];
    $video = $vv['url'];
  ?>

  
<body onload="hfindex()">
    
  <div id="header"></div>
    <div class="Linea1Planilla">
      <div class="Linea2">
        <div class="Linea3">
          <div class="Planilla">
            <div class="PlanillaFrame">

            <div class="BannerPlanillaEditable">
                <h2>Banner:</h2>
                <hr />
                <div class="BannerEditable">
                <?php
                echo "<div class='Banner'><img src='../img/".$banner."' id='banner' style='max-height:100%; max-width:100%;'></div>";
                ?>
                </div>

                <br>
                <h2>Nuevo Proyecto:</h2>
                <hr />
              
                <div class="form-group">
                <input
                    type="text"
                    class="form-control"
                    id="user"
                    data-idp="<?php echo $idproyecto ?>"
                    placeholder= "Nombre de Proyecto"
                    name="nombre_proyecto"
                    value="<?php echo utf8_encode($titulo) ?>">
                  </div>
                
                <hr />

              
                <div class="form-group" >
                  <textarea
                    class="form-control"
                    rows="5"
                    placeholder="Introduccion"
                    
                    id="descripcionCorta_Proyecto"><?php echo utf8_encode($introduccion); ?>
                  </textarea>
                </div>
                  <?php
                  while($row = $result->fetch_array()){
                   echo "<div class='form-group'>
                   <input type='text' class='form-control' id='link' placeholder='URL del Video [YouTube]' name='nombre_proyecto' value= '".$video."' /></div>";
                  }
                  ?>
 
                
                <div class="form-group">
                  <textarea
                    class="form-control"
                    rows="5"
                    placeholder="Descripcion"
                    id="descripcionLarga_Proyecto"><?php echo utf8_encode($descripcion); ?>
                  </textarea>
                </div>
                
                <a class="BotonLogin2"  style="<?php echo $aprobar ?>"
                  ><button style="margin-top: 5%;" onclick="aprobar(4)">
                    <i class="fa">&#xf14a;</i> Aprobar Proyecto
                  </button></a
                >
                <button onclick="ActualizoPlanilla()" style="margin-top: 5%;">
                    <i class="fa">&#xf0c7;</i> Guardar Cambios
                  </button>

                <div class="ImagenesPlanilla">
                <h2>Fotos:</h2>
                <hr />
                <div class="Foto">
                <form action="uploadIMG.php" method="post" enctype="multipart/form-data">
                  <input type="file" accept="image/x-png,image/jpg,image/jpeg" onchange="cambiar()" name="fileToUpload" id="fileToUpload1" hidden="hidden" />
                  <label for="fileToUpload"><i class="fa">&#xf03e;</i> Seleccionar Imagen</label><br>
                    <label>
                      <input type="submit" class="button" hidden="hidden">Subir Imagen
                    </label>
                  </form>
                </div>
                <div class="Foto">
                 <form action="uploadIMGprincipal.php" method="post" enctype="multipart/form-data">
                  <input type="file" accept="image/x-png,image/jpg,image/jpeg" onchange="cambiar()" name="fileToUpload" id="fileToUpload2" hidden="hidden" />
                  <label for="fileToUpload"><i class="fa">&#xf03e;</i> Seleccionar Imagen Principal</label><br>
                    <label>
                      <input type="submit" class="button" hidden="hidden">Subir Imagen
                    </label>
                 </form>
                </div>
                <div class="Foto">
                <form action="uploadBanner.php" method="post" enctype="multipart/form-data">
                  <input type="file" accept="image/x-png,image/jpg,image/jpeg" onchange="cambiar()" name="fileToUpload" id="fileToUpload3" hidden="hidden" />
                  <label for="fileToUpload"><i class="fa">&#xf03e;</i> Seleccionar Banner</label><br>
                    <label>
                      <input type="submit" class="button" hidden="hidden">Subir Imagen
                    </label>  
                  </form>
                </div>
              </div>
                

              </div>
            
                </div>
              </div>
            </div>    
            <div class="MobileView">
              <div class="ImagenesPlanillaMobile">
                <h2>Fotos:</h2>
                <hr />
                <div class="Fotos">
                  <div class="Foto">
                    asdasd
                  </div>
                  <div class="Foto">
                    asdasd
                  </div>
                  <div class="Foto">
                    asdasd
                  </div>
                </div>
              </div>
              <div class="VideoMobile">
                <iframe
                  width="560"
                  height="315"
                  src="https://www.youtube.com/embed/XYZ123"
                  frameborder="0"
                  allowfullscreen
                ></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <p id="msg"></p>
    <div id="footer"></div>
  </body>
</html>