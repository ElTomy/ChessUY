<?php
//mysqli_connect('costatotal.com.uy', 'costat7_cyberhydra', 'cyberhydra-0192', 'costat7_cyberhydra')
//mysqli_connect('179.27.156.47', 'cyberhydra', 'hugoturbio667', 'chessuy', '33061')
//mysqli_connect('179.27.156.47', 'UsuarioChessuy', 'AjedezChessuy', 'chessuy', '33061')
class servidor
{
    function conectar()
    {
        if (!$conexion = mysqli_connect('179.27.156.47', 'UsuarioChessuy', 'AjedezChessuy', 'chessuy', '33061')) {
            echo "No se pudo conectar a la base de datos";
            exit;
        } else {
            $sql = "set names 'utf8'";
            mysqli_query($conexion, $sql);
            return $conexion;
        }
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function VerificoSesion($tipo){

        if(!isset($_SESSION["usuario"])){
            header("Location: /chessuy/Form/login.html");

        }else{
            switch ($tipo) {
                case 0: //admin
                    if($_SESSION["tipo"] != "0"){
                        header("Location: /chessuy/Form/login.html");
                    }
                    break;
                case 1: //jugador
                    if($_SESSION["tipo"] != "1"){
                        header("Location: /chessuy/Form/login.html");
                    }
                    break;
                case 2: //arbitro
                    if($_SESSION["tipo"] != "2"){
                        header("Location: /chessuy/Form/login.html");
                    }
                    break;
                case 3: //periodista
                    if($_SESSION["tipo"] != "3"){
                    header("Location: /chessuy/Form/login.html");
                    }
                    break;
            }
            }
        
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function cerrarSesion(){
        session_start();
        session_destroy();
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function login($usuario, $pass){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL login(?,?)";
        $stmts = $conn->prepare($sql);
        $pass = sha1($pass);
        $stmts->bind_param("ss", $usuario, $pass);
        $us = "";
        if ($stmts->execute()) {
            $stmts->store_result();
            $stmts->bind_result($tipo, $us, $ci, $año, $apellido, $Institucion, $Nombre, $Contacto, $Contraseña, $Nacimiento, $Mail,  $Icono, $ColorIcono, $ColorFondo);
            if ($stmts->fetch()) {
                if ($us == null) {
                    $stmts->close();
                    $info = array('error' => true);
                    return $info;
                } else {
                    $stmts->close();
                    session_start();

                    $_SESSION['icono'] = $Icono;
                    $_SESSION['coloricono'] = $ColorIcono;
                    $_SESSION['colorfondo'] = $ColorFondo;
                    $_SESSION['usuario'] = $us;
                    $_SESSION['tipo'] = $tipo;

                    $info = array('error' => false, 'usuario' => $us, 'tipo' => $tipo);
                    return $info;
                }
            } else {
                $info = array('error' => true);
                return $info;
            }
        } else {
            $info = array('error' => true);
            return $info;
        }
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function Register($tipo, $us, $ci, $año, $apellido, $Institucion, $Nombre, $Contacto, $Contraseña, $Nacimiento, $Mail, $Icono, $ColorIcono, $ColorFondo){
        $conn = $this->conectar();
        $sql = "CALL Register(?,?,?,?,?,?,?,?,?,?,?,?,?,?,@x)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("isiissssssssss", $tipo, $us, $ci, $año, $apellido, $Institucion, $Nombre, $Contacto, $Contraseña, $Nacimiento, $Mail, $Icono, $ColorIcono, $ColorFondo);
        if ($stmts->execute()) {
            $resultado = $conn->query('SELECT @x as p_out');
            $x = $resultado->fetch_assoc();
            if ($x['p_out'] == "1") {
                $stmts->close();
                $valor = 1;
            } else {
                if ($x['p_out'] == "2") {
                    $stmts->close();
                    $valor = 2;
                } else {
                    $stmts->close();
                    $valor = 0;
                }
            }
        } else {
            $valor = $stmts->error;
        }
        return $valor;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function BorarSolicitud($usuario){
        $conn = $this->conectar();
        $sql = "CALL BorarSolicitud(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("s", $usuario);
        $stmts->execute();
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function AgregarUsuario($tipo, $us, $ci, $año, $apellido, $Institucion, $Nombre, $Contacto, $Contraseña, $Nacimiento, $Mail){
        $Icono='fas fa-user';
        $ColorIcono='#ffffff';
        $ColorFondo='#0076be';
        $conn = $this->conectar();
        $sql = "CALL AgregarUsuario(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("isiissssssssss", $tipo, $us, $ci, $año, $apellido, $Institucion, $Nombre, $Contacto, $Contraseña, $Nacimiento, $Mail, $Icono,  $ColorIcono ,   $ColorFondo);
        $stmts->execute();
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function InfoSolicitudes(){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL InfoSolicitudes()";
        $stmts = $conn->prepare($sql);


        if ($stmts->execute()) {
            $stmts->store_result();
            $stmts->bind_result($tipo, $us, $ci, $año, $apellido, $Institucion, $Nombre, $Contacto, $Contraseña, $Nacimiento, $Mail);
            while ($stmts->fetch()) {
                $data = array('tipo' => $tipo, 'usuario' => $us, 'ci' => $ci, 'año' => $año, 'apellido' => $apellido, 'Institucion' => $Institucion, 'Nombre' => $Nombre, 'Contacto' => $Contacto, 'Contraseña' => sha1($Contraseña), 'Nacimiento' => $Nacimiento, 'Mail' => $Mail);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function InfoUsuario(){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL InfoUsuarios()";
        $stmts = $conn->prepare($sql);

        if ($stmts->execute()) {
            
            $stmts->store_result();
            $stmts->bind_result($tipo, $us, $ci, $año, $apellido, $Institucion, $Nombre, $Contacto, $Contraseña, $Nacimiento, $Mail, $Icono, $ColorIcono, $ColorFondo);
            while ($stmts->fetch()) {
                $data = array('tipo' => $tipo, 'usuario' => $us, 'ci' => $ci, 'año' => $año, 'apellido' => $apellido, 'Institucion' => $Institucion, 'Nombre' => $Nombre, 'Contacto' => $Contacto, 'Contraseña' => $Contraseña, 'Nacimiento' => $Nacimiento, 'Mail' => $Mail, 'Icono' => $Icono, 'ColorIcono'  => $ColorIcono, 'ColorFondo'  => $ColorFondo);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
     //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function InfoTorneo(){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL InfoTorneo()";
        $stmts = $conn->prepare($sql);

        if ($stmts->execute()) {
            
            $stmts->store_result();
            $stmts->bind_result($ID_Torneo, $ELO_Min, $ELO_Max, $Fecha_inicio, $Fecha_fin, $Numero_Participantes, $Primero, $Segundo, $Tercero, $TiempoDescalificar, $PartidasxDia, $CantidaddeReservas, $Localidad, $EdadMinima, $EdadMaxima, $tiempo, $InicioTorneo,$Preset,$nombre);
            while ($stmts->fetch()) {
                $data = array('ID_Torneo' => $ID_Torneo, 'ELO_Min' => $ELO_Min, 'ELO_Max' => $ELO_Max, 'Fecha_inicio' => $Fecha_inicio, 'Fecha_fin' => $Fecha_fin, 'Numero_Participantes' => $Numero_Participantes, 'Primero' => $Primero, 'Segundo' => $Segundo, 'Tercero' => $Tercero, 'TiempoDescalificar' => $TiempoDescalificar, 'PartidasxDia' => $PartidasxDia, 'CantidaddeReservas' => $CantidaddeReservas, 'Localidad' => $Localidad, 'EdadMinima' => $EdadMinima, 'EdadMaxima' => $EdadMaxima, 'tiempo' => $tiempo, 'InicioTorneo' => $InicioTorneo,'Preset' => $Preset,'nombre' =>$nombre);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function Top(){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL Top()";
        $stmts = $conn->prepare($sql);
        if ($stmts->execute()) {
            
            $stmts->store_result();
            $stmts->bind_result($tipo, $us, $ci, $año, $apellido, $Institucion, $Nombre, $Contacto, $Contraseña, $Nacimiento, $Mail, $Icono, $ColorIcono, $ColorFondo, $ELO);
            while ($stmts->fetch()) {
                $data = array('tipo' => $tipo, 'usuario' => $us, 'ci' => $ci, 'año' => $año, 'apellido' => $apellido, 'Institucion' => $Institucion, 'Nombre' => $Nombre, 'Contacto' => $Contacto, 'Contraseña' => $Contraseña, 'Nacimiento' => $Nacimiento, 'Mail' => $Mail, 'Icono' => $Icono, 'ColorIcono'  => $ColorIcono, 'ColorFondo'  => $ColorFondo, 'ELO'  => $ELO);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function PerfilUsuario($user){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL PerfilUsuario(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("s", $user);

        if ($stmts->execute()) {
            $stmts->store_result();
            $stmts->bind_result($tipo, $us, $ci, $año, $apellido, $Institucion, $Nombre, $Contacto, $Contraseña, $Nacimiento, $Mail, $Icono, $ColorIcono, $ColorFondo);
            while ($stmts->fetch()) {
                $data = array('tipo' => $tipo, 'usuario' => $us, 'ci' => $ci, 'año' => $año, 'apellido' => $apellido, 'Institucion' => $Institucion, 'Nombre' => $Nombre, 'Contacto' => $Contacto, 'Contraseña' => $Contraseña, 'Nacimiento' => $Nacimiento, 'Mail' => $Mail, 'Icono' => $Icono, 'ColorIcono'  => $ColorIcono, 'ColorFondo'  => $ColorFondo);
                return $data;
            }
            $stmts->close();
        }
        return false;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function CrearTorneo($tiempo, $ELO_Min, $ELO_Max, $Fecha_inicio, $Fecha_fin, $Numero_Participantes,$TiempoDescalificar,$PartidasxDia,$CantidaddeReservas,$Localidad,$EdadMinima,$EdadMaxima,$InicioTorneo,$Preset,$nombre)
    {
        $conn = $this->conectar();
        $sql = "CALL CrearTorneo(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmts = $conn->prepare($sql);

        $execute = false;
        $stmts->bind_param("iiissiiiisiisis",$tiempo,$ELO_Min,$ELO_Max,$Fecha_inicio,$Fecha_fin,$Numero_Participantes,$TiempoDescalificar,$PartidasxDia,$CantidaddeReservas,$Localidad,$EdadMinima,$EdadMaxima,$InicioTorneo,$Preset,$nombre);
        if($stmts->execute()) {
            $execute = true;
        }
        echo $execute;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function InfoEstadisticas($usuario){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL InfoEstadisticas(?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("s", $usuario);
        if ($stmts->execute()) {
            $stmts->store_result();
            $stmts->bind_result($Usuario,$ELO,$Victorias,$Derrotas,$Tablas,$Coronaciones,$Comidas,$Menos_Tiempo,$Menos_Movimientos);
            $stmts->fetch();
            $stmts->close();
            return array($ELO,$Victorias,$Derrotas,$Tablas,$Coronaciones,$Comidas,$Menos_Tiempo,$Menos_Movimientos);

        }
        return false;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function GuardoFotoPerfil($Usuario, $NumeroIcono, $ColorIcono, $ColorFondo){
        $conn = $this->conectar();
        $sql = "CALL GuardoFotoPerfil(?,?,?,?)";
        $stmts = $conn->prepare($sql);
        $execute = false;

        $stmts->bind_param("ssss",$Usuario,$NumeroIcono,$ColorIcono,$ColorFondo);
        if($stmts->execute()){
            $execute = true;
            if($Usuario == $_SESSION['usuario']){
                $_SESSION['icono'] = $NumeroIcono;
                $_SESSION['coloricono'] = $ColorIcono;
                $_SESSION['colorfondo'] = $ColorFondo;
            }
            
        }
        return $execute;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function AgregarEstadistica($Usuario, $ELO, $Victorias, $Derrotas, $Tablas, $Coronaciones, $Comidas, $Menos_Tiempo, $Menos_Movimientos){
        $conn = $this->conectar();
        $sql = "CALL AgregarEstadistica(?,?,?,?,?,?,?,?,?)";
        $stmts = $conn->prepare($sql);
        $execute = false;

        $stmts->bind_param("isiiiiiii",$ELO,$Usuario,$Victorias,$Derrotas,$Tablas,$Coronaciones,$Comidas,$Menos_Tiempo,$Menos_Movimientos);
        if($stmts->execute()){
            $execute = true;
        }
        return $execute;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function BorrarUsuario($usuario){
        $conn = $this->conectar();
        $sql = "CALL BorrarUsuario(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("s", $usuario);
        $stmts->execute();
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function CambioNombre($nombre, $usuario){
        $conn = $this->conectar();
        $sql = "CALL CambioNombre(?,?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("ss", $nombre, $usuario);
        if($stmts->execute()){
            $execute = true;
            session_start();
            if($usuario == $_SESSION['usuario']){
                $_SESSION['usuario'] = $nombre;
            }            
        }
        return $execute;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function ActualizarUsuario($Usuario, $Nombre, $Apellido, $Mail, $Institucion, $Año, $Cedula, $Contacto){
        $conn = $this->conectar();
        $sql = "CALL ActualizarUsuario(?,?,?,?,?,?,?,?)";
        $stmts = $conn->prepare($sql);
        $execute = false;

        $stmts->bind_param("sssssiis",$Usuario, $Nombre, $Apellido, $Mail, $Institucion, $Año, $Cedula, $Contacto);
        if($stmts->execute()){
            $execute = true;
        }
        return $execute;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function CambiarContraseña($usuario, $contraNueva){
        $conn = $this->conectar();
        $sql = "CALL CambiarContrasenia(?,?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("ss", $usuario, $contraNueva);
        $stmts->execute();
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function TraigoLogros(){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL TraigoLogros()";
        $stmts = $conn->prepare($sql);

        if ($stmts->execute()) {
            
            $stmts->store_result();
            $stmts->bind_result($id, $descripcion, $imagen, $porcentaje, $nombre);
            while ($stmts->fetch()) {
                $data = array('ID' => $id, 'Descripcion' => $descripcion, 'Imagen' => $imagen, 'Porcentaje' => $porcentaje, 'Nombre' => $nombre);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function TraigoPartidos(){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL TraigoPartidos()";
        $stmts = $conn->prepare($sql);

        if ($stmts->execute()) {

            $stmts->store_result();
            $stmts->bind_result($id, $Usuario1, $Usuario2, $Turno, $Color1, $Color2, $Tablero, $Estado, $movimientos, $jaque1, $jaque2, $Torneo, $barra, $tiempo1, $tiempo2);
            while ($stmts->fetch()) {
                $data = array('ID' => $id, 'usu1' => $Usuario1, 'usu2' => $Usuario2, 'turno' => $Turno, 'col1' => $Color1, 'col2' => $Color2, 'tablero' => $Tablero, 'estado' => $Estado, 'movimientos' => $movimientos, 'jaque1' => $jaque1, 'jaque2' => $jaque2, 'Torneo' => $Torneo, 'barra' => $barra, 'tiempo1' => $tiempo1, 'tiempo2' => $tiempo2);
                                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function TraigoMisLogros($usuario){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL TraigoMisLogros(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("s", $usuario);
        if ($stmts->execute()) {
            
            $stmts->store_result();
            $stmts->bind_result($id);
            while ($stmts->fetch()) {
                $data = array('ID' => $id);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function TraigoLogro($idl){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL TraigoLogro(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("i", $idl);
        if ($stmts->execute()) {
            
            $stmts->store_result();
            $stmts->bind_result($id);
            while ($stmts->fetch()) {
                $data = array('ID' => $id);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function UnirsePartidos($idp, $usu, $col2){
        $conn = $this->conectar();
        $sql = "CALL UnirsePartidos(?,?,?)";
        $stmts = $conn->prepare($sql);
        $execute = false;

        $stmts->bind_param("isi",$idp, $usu, $col2);
        if($stmts->execute()){
            $execute = true;   
        }
        return $execute;
    }   
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //       
    function NuevoLogro($usuario,$Id){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL NuevoLogro(?,?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("si", $usuario,$Id);
        $stmts->execute();
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function ActualizoPorcentaje($Id,$por){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL ActualizoPorcentaje(?,?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("ii", $Id,$por);
        $stmts->execute();
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function EditarParticipante($Usuario, $Puntos, $Coronaciones, $Comidas, $Menos_Tiempo, $Menos_Movimientos, $id){
        $conn = $this->conectar();
        $sql = "CALL EditarParticipante(?,?,?,?,?,?,?)";
        $stmts = $conn->prepare($sql);
        $execute = false;

        $stmts->bind_param("siiiiii",$Usuario,$Puntos,$Coronaciones,$Comidas,$Menos_Tiempo,$Menos_Movimientos,$id);
        if($stmts->execute()){
            $execute = true;
        }
        return $execute;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function CrearPartidos($usu, $col1){
        $conn = $this->conectar();
        $sql = "CALL CrearPartidos(?,?)";
        $stmts = $conn->prepare($sql);
        $execute = false;

        $stmts->bind_param("si",$usu, $col1);
        if($stmts->execute()){
            $execute = true;            
        }
        return $execute;
    }
     //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function InfoParticipante($usuario){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL InfoParticipante(?,@x)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("s", $usuario);
        if ($stmts->execute()) {
            $resultado = $conn->query('SELECT @x as p_out');
            $x = $resultado->fetch_assoc();
            if ($x['p_out'] == "1") {
                $stmts->close();
                $valor = 1;
            } else {
                if ($x['p_out'] == "0") {
                    $stmts->close();
                    $valor = 0;
                } 
            }
        } else {
            $valor = $stmts->error;
        }
        return $valor;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function CrearNoticia($Usuario, $Titulo, $Descripcion, $Informacion, $img){
        $conn = $this->conectar();
        $sql = "CALL CrearNoticia(?,?,?,?,?)";
        $stmts = $conn->prepare($sql);
        $execute = false;

        $stmts->bind_param("sssss",$Usuario, $Titulo, $Descripcion, $Informacion, $img);
        if($stmts->execute()){
            $execute = true;
        }else{
            $execute = $stmts->error;
        }
        return $execute;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function ModificarNoticia($Usuario, $id, $Titulo, $Descripcion, $Informacion, $img){
        $conn = $this->conectar();
        $sql = "CALL ModificarNoticia(?,?,?,?,?,?)";
        $stmts = $conn->prepare($sql);
        $execute = false;

        $stmts->bind_param("sissss",$Usuario, $id, $Titulo, $Descripcion, $Informacion, $img);
        if($stmts->execute()){
            $execute = true;
        }
        return $execute;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function EliminarNoticia($id){
        $conn = $this->conectar();
        $sql = "CALL EliminarNoticia(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("i", $id);
        $stmts->execute();
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function guardoTablero($id_partido, $Tablero, $turno, $movimientos, $barra){
        $conn = $this->conectar();
        $sql = "CALL GuardoTablero(?,?,?,?,?)";
        $stmts = $conn->prepare($sql);
        $execute = false;

        $stmts->bind_param("isisi",$id_partido, $Tablero, $turno, $movimientos,$barra);
        if($stmts->execute()){
            $execute = true;
        }
        return $execute;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function TraigoNoticias($id){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL TraigoNoticias(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("i", $id);

        if ($stmts->execute()) {
            
            $stmts->store_result();
            $stmts->bind_result($Usuario, $ID, $Titulo, $Descripcion, $Informacion, $IMG);
            while ($stmts->fetch()) {
                $data = array('ID' => $ID, 'Usuario' => $Usuario, 'Titulo' => $Titulo, 'Descripcion' => $Descripcion, 'Informacion' => $Informacion, 'IMG' => $IMG);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function MuestroNoticias(){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL MuestroNoticias()";
        $stmts = $conn->prepare($sql);

        if ($stmts->execute()) {
            
            $stmts->store_result();
            $stmts->bind_result($Usuario, $ID, $Titulo, $Descripcion, $Informacion, $IMG);
            while ($stmts->fetch()) {
                $data = array('ID' => $ID, 'Usuario' => $Usuario, 'Titulo' => $Titulo, 'Descripcion' => $Descripcion, 'Informacion' => $Informacion, 'IMG' => $IMG);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function traigoTablero($id){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL TraigoTablero(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("i", $id);
        if ($stmts->execute()) {
            
            $stmts->store_result();
            $stmts->bind_result($Tablero, $Turno, $movimientos, $barra, $tiempo1, $tiempo2);
            while ($stmts->fetch()) {
                $data = array('tablero' => $Tablero, 'turno' => $Turno, 'movimientos' => $movimientos, 'barra' => $barra, 'tiempo1' => $tiempo1, 'tiempo2' => $tiempo2);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function NoticiasIndex(){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL NoticiasIndex()";
        $stmts = $conn->prepare($sql);

        if ($stmts->execute()) {
            
            $stmts->store_result();
            $stmts->bind_result($Usuario, $ID, $Titulo, $Descripcion, $Informacion, $IMG);
            while ($stmts->fetch()) {
                $data = array('ID' => $ID, 'Usuario' => $Usuario, 'Titulo' => $Titulo, 'Descripcion' => $Descripcion, 'Informacion' => $Informacion, 'IMG' => $IMG);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function FixturePuntos($id){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL FixturePuntos(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("i", $id);

        if ($stmts->execute()) {
            
            $stmts->store_result();
            $stmts->bind_result($Usuario, $Puntos, $Coronaciones, $Comidas, $Menos_Tiempo, $Menos_Movimientos, $id);
            while ($stmts->fetch()) {
                $data = array('Usuario' => $Usuario, 'Puntos' => $Puntos, 'Coronaciones' => $Coronaciones, 'Comidas' => $Comidas, 'Menos_Tiempo' => $Menos_Tiempo, 'Menos_Movimientos' => $Menos_Movimientos, 'id' => $id);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function AgendoPartida($Usuario1, $Usuario2, $Color1, $Color2,$IDT,$Tiempo){
        $conn = $this->conectar();
        $sql = "CALL AgendoPartida(?,?,?,?,?,?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("ssssis",$Usuario1, $Usuario2, $Color1, $Color2,$IDT,$Tiempo);
        if($stmts->execute()){
            $execute = true;
        }
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function InfoPartidaTorneo($IDT,$Usuario1, $Usuario2, $Fecha, $Ronda){
        $conn = $this->conectar();
        $sql = "CALL InfoPartidaTorneo(?,?,?,?,?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("isssi", $IDT,$Usuario1, $Usuario2, $Fecha, $Ronda);
        if($stmts->execute()){
            $execute = true;
        }
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function InfoPartida($Nombre,$ID){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL InfoPartida(?,?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("si", $Nombre,$ID);

        if ($stmts->execute()) {

            $stmts->store_result();
            $stmts->bind_result($ID_Torneo, $Jugador1, $Jugador2, $Fecha, $ronda);
            while ($stmts->fetch()) {
                $data = array('ID_Torneo' => $ID_Torneo, 'Jugador1' => $Jugador1, 'Jugador2' => $Jugador2, 'Fecha' => $Fecha, 'ronda' => $ronda);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function BuscoJugador($usuario){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL BuscoJugador(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("s", $usuario);

        if ($stmts->execute()) {
            $stmts->store_result();
            $stmts->bind_result($Usuario, $icono, $colIcono, $colFondo, $tipo);
            while ($stmts->fetch()) {
                $data = array('Usuario' => $Usuario, 'icono' => $icono, 'colIcono' => $colIcono, 'colFondo' => $colFondo, 'tipo' => $tipo);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function AgregoUsuarioOnline($usuario){
        $conn = $this->conectar();
        $sql = "CALL AgregoUsuOnline(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("s", $usuario);
        if($stmts->execute()){
            return true;
        }
        return false;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function BorroUsuarioOnline($usuario){
        $conn = $this->conectar();
        $sql = "CALL BorroUsuOnline(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("s", $usuario);
        if($stmts->execute()){
            return true;
        }
        return false;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function BuscoUsuarioOnline(){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL BuscoUsuOnline()";
        $stmts = $conn->prepare($sql);

        if ($stmts->execute()) {
            $stmts->store_result();
            $stmts->bind_result($Usuario);
            while ($stmts->fetch()) {
                $data = array('Usuario' => $Usuario);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function TraigoPartidosTorneo(){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL TraigoPartidosTorneo()";
        $stmts = $conn->prepare($sql);

        if ($stmts->execute()) {

            $stmts->store_result();
            $stmts->bind_result($id, $Usuario1, $Usuario2, $Turno, $Color1, $Color2, $Tablero, $Estado, $movimientos, $Torneo, $Jaque1, $Jaque2 ,$Barra ,$Tiempo ,$Tiempo2);
            while ($stmts->fetch()) {
                $data = array('ID' => $id, 'usu1' => $Usuario1, 'usu2' => $Usuario2, 'turno' => $Turno, 'col1' => $Color1, 'col2' => $Color2, 'tablero' => $Tablero, 'estado' => $Estado, 'movimientos' => $movimientos, 'Torneo' => $Torneo, 'Jaque1' => $Jaque1, 'Jaque2' => $Jaque2, 'Barra' => $Barra, 'Tiempo' => $Tiempo, 'Tiempo2' => $Tiempo2);
                                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function guardoJaque($Usuario, $jug, $jaque){
        $conn = $this->conectar();
        $sql = "CALL GuardoJaque(?,?,?)";
        $stmts = $conn->prepare($sql);
        $execute = false;

        $stmts->bind_param("iss",$jug, $jaque, $Usuario);
        if($stmts->execute()){
            $execute = true;
        }
        return $execute;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function traigoJaque($usuario, $jug){
        $conn = $this->conectar();
        $info = 'ERROR';
        $sql = "CALL TraigoJaque(?,?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("si", $usuario, $jug);
        if ($stmts->execute()) {
            
            $stmts->store_result();
            $stmts->bind_result($jaque);
            while ($stmts->fetch()) {
                $info = $jaque;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function ProblemasNoResueltos($usuario){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL ProblemasNoResueltos(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("s", $usuario);

        if ($stmts->execute()) {
            $stmts->store_result();
            $stmts->bind_result($ID);
            while ($stmts->fetch()) {
                $data = array('ID' => $ID);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function cambioEstado($Usuario, $jug){
        $conn = $this->conectar();
        $sql = "CALL terminoPartido(?,?)";
        $stmts = $conn->prepare($sql);
        $execute = false;

        $stmts->bind_param("is",$jug, $Usuario);
        if($stmts->execute()){
            $execute = true;
        }
        return $execute;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function TraigoEntrenamiento($id){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL TraigoEntrenamiento(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("i", $id);

        if ($stmts->execute()) {
            $stmts->store_result();
            $stmts->bind_result($ID,$CantidadMovimientos,$Tablero);
            while ($stmts->fetch()) {
                $data = array('CantidadMovimientos' => $CantidadMovimientos,'Tablero' => $Tablero,'ID' => $id);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function TraigoUltimaIDpartido(){
        $conn = $this->conectar();
        $info = 'ERROR';
        $sql = "CALL TraigoUltimaIDpartido()";
        $stmts = $conn->prepare($sql);

        if ($stmts->execute()) {
            $stmts->store_result();
            $stmts->bind_result($id);
            while ($stmts->fetch()) {
                $info = $id;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function MovimientoCorrecto($id,$Turno,$x,$y,$Pieza){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL MovimientoCorrecto(?,?,?,?,?)";    
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("iiiis", $id,$Turno,$x,$y,$Pieza);

        if ($stmts->execute()) {
            $stmts->store_result();
            $stmts->bind_result($XP,$YP,$PP,$XNULL,$YNULL);
            while ($stmts->fetch()) {
                $data = array('x' => $XP,'y' => $YP,'Pieza' => $PP,'XNULL' => $XNULL,'YNULL' => $YNULL);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function EntrenamientoCompleto($id,$usuario){
        $conn = $this->conectar();
        $sql = "CALL EntrenamientoCompleto(?,?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("is", $id,$usuario);
        if($stmts->execute()){
            return true;
        }
        return false;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function cargoPartido($id){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL cargoPartido(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("i", $id);

        if ($stmts->execute()) {

            $stmts->store_result();
            $stmts->bind_result($id, $Usuario1, $Usuario2, $Turno, $Color1, $Color2, $Tablero, $Estado, $movimientos, $jaque1, $jaque2, $Torneo, $barra, $tiempo1, $tiempo2);
            while ($stmts->fetch()) {
                $data = array('usu1' => $Usuario1, 'usu2' => $Usuario2, 'col1' => $Color1, 'col2' => $Color2, 'turno' => $Turno, 'tablero' => $Tablero, 'movimientos' => $movimientos, 'jaque1' => $jaque1, 'jaque2' => $jaque2, 'barra' => $barra, 'tiempo1' => $tiempo1, 'tiempo2' => $tiempo2);
                                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function guardoTiempo($id_partido,$jug, $tiempo){
        $conn = $this->conectar();
        $sql = "CALL GuardoTiempo(?,?,?)";
        $stmts = $conn->prepare($sql);
        $execute = false;

        $stmts->bind_param("iis",$id_partido, $jug, $tiempo);
        if($stmts->execute()){
            $execute = true;
        }
        return $execute;
    }
    //
    //
    /*------------------------------------------------------------------------------------------*/
    //
    //
    function TraigoUsuariosTorneo($id){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL TraigoUsuariosTorneo(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("i", $id);

        if ($stmts->execute()) {
            $stmts->store_result();
            $stmts->bind_result($usuarios);
            while ($stmts->fetch()) {
                $data = array('usuarios' => $usuarios);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
}
