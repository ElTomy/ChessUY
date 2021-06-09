<?php
class servidor{
    function conectar(){
        if(!$conexion = mysqli_connect('localhost','root','root','ChessUY')){
            echo "No se pudo conectar a la base de datos";
            exit;
        }else{
            $sql = "set names 'utf8'";
            mysqli_query($conexion, $sql);
            return $conexion;
        }
    }
    function login($usuario, $pass){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL login(?,?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("ss",$usuario, $pass);
        $us="";
        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result($tipo,$us,$ci,$año,$apellido,$Institucion,$Nombre,$Contacto,$Contraseña,$Nacimiento,$Mail);
            if($stmts->fetch()){
                if($us == null){
                    $stmts->close();
                    $info = array('error'=> true);
                    return $info;
                }else{
                    $stmts->close();
                    session_start();
                    $_SESSION['usuario'] = $us;
                    $_SESSION['tipo'] = $tipo;
                    $info = array('error'=> false, 'usuario'=> $us, 'tipo' => $tipo);
                    return $info;
                }
            }else{
                $info = array('error'=> true);
                return $info;
            }
        
        }else{
            $info = array('error'=> true);
            return $info;
        }
    }
    function Register($tipo,$us,$ci,$año,$apellido,$Institucion,$Nombre,$Contacto,$Contraseña,$Nacimiento,$Mail){
        $conn = $this->conectar();
        $sql = "CALL login(?,?,?,?,?,?,?,?,?,?,?,@x)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("isiisssssss",$tipo,$us,$ci,$año,$apellido,$Institucion,$Nombre,$Contacto,$Contraseña,$Nacimiento,$Mail);
        if($stmts->execute()){
            $resultado = $conn->query('SELECT @x as p_out');
            $x = $resultado->fetch_assoc();
            if($x['p_out'] == "1"){
                $stmts->close();
                $valor = 1;
            }else{
                if($x['p_out'] == "2"){
                    $stmts->close();
                    $valor = 2;
                }else{
                    $stmts->close();
                    $valor = 0;
                }
            }
        }else{
            $valor = 0;
        }
        return $valor;
    }
    function BorarSolicitud($usuario){
        $conn = $this->conectar();
        $sql = "CALL BorarSolicitud(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("s",$usuario);
        $stmts->execute();
    }
    function AgregarUsuario($tipo,$us,$ci,$año,$apellido,$Institucion,$Nombre,$Contacto,$Contraseña,$Nacimiento,$Mail){
        $conn = $this->conectar();
        $sql = "CALL AgregarUsuario(?,?,?,?,?,?,?,?,?,?,?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("isiisssssss",$tipo,$us,$ci,$año,$apellido,$Institucion,$Nombre,$Contacto,$Contraseña,$Nacimiento,$Mail);
        $stmts->execute();
    }
    function InfoSolicitudes(){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL InfoSolicitudes()";
        $stmts = $conn->prepare($sql);


        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result($tipo,$us,$ci,$año,$apellido,$Institucion,$Nombre,$Contacto,$Contraseña,$Nacimiento,$Mail);
            while($stmts->fetch()){
                $data = array('tipo' => $tipo, 'usuario' => $us, 'ci' => $ci, 'año' => $año, 'apellido' => $apellido, 'Institucion' => $Institucion, 'Nombre' => $Nombre, 'Contacto' => $Contacto, 'Contraseña' => sha1($Contraseña), 'Nacimiento' => $Nacimiento, 'Mail' => $Mail);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $info;
    }
    function InfoUsuario(){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL InfoUsuario()";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param();
        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result($tipo,$us,$ci,$año,$apellido,$Institucion,$Nombre,$Contacto,$Contraseña,$Nacimiento,$Mail);
            while($stmts->fetch()){
                $data = array('tipo' => $tipo, 'usuario' => $us, 'ci' => $ci, 'año' => $año, 'apellido' => $apellido, 'Institucion' => $Institucion, 'Nombre' => $Nombre, 'Contacto' => $Contacto, 'Contraseña' => $Contraseña, 'Nacimiento' => $Nacimiento, 'Mail' => $Mail);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $Info;
    }
    function CrearTorneo($Rondas,$ELO_Min,$ELO_Max,$Fecha_inicio,$Fecha_fin,$Numero_Participantes){
        $conn = $this->conectar();
        $sql = "CALL CrearTorneo(?,?,?,?,?,?,?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("iiissii",$Rondas,$ELO_Min,$ELO_Max,$Fecha_inicio,$Fecha_fin,$Numero_Participantes);
    }
    function InfoEstadisticas($usuario){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL InfoEstadisticas(?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("s",$Usuario);
        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result($Usuario,$ELO,$Victorias,$Derrotas,$Tablas,$Coronaciones,$Comidas,$Menos_Tiempo,$Menos_Movimientos);
            while($stmts->fetch()){
                $data = array('ELO' => $ELO, 'usuario' => $Usuario, 'Victorias' => $Victorias, 'Derrotas' => $Derrotas, 'Tablas' => $Tablas, 'Coronaciones' => $Coronaciones, 'Comidas' => $Comidas, 'Menos_Tiempo' => $Menos_Tiempo, 'Menos_Movimientos' => $Menos_Movimientos);
                $info[] = $data;
            }
            $stmts->close();
        }
        return $Info;
    }
    function AgregarEstadistica($Usuario,$ELO,$Victorias,$Derrotas,$Tablas,$Coronaciones,$Comidas,$Menos_Tiempo,$Menos_Movimientos){
        $conn = $this->conectar();
        $sql = "CALL AgregarEstadistica(?,?,?,?,?,?,?,?,?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("isiiiiiii",$ELO,$Usuario,$Victorias,$Derrotas,$Tablas,$Coronaciones,$Comidas,$Menos_Tiempo,$Menos_Movimientos);
    }
}
?>