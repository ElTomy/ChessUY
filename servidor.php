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
            $stmts->bind_result($tipo,$us,$ci,$año,$apellido,$Institucion,$Nombre,$Contacto,$Contrasenia,$Nacimiento,$Mail);
            if($stmts->fetch()){
                if($us == null){
                    $stmts->close();
                    $info[0] = "asd";
                    return $info;
                }else{
                    $stmts->close();
                    session_start();
                    $_SESSION['usuario'] = $us;
                    $_SESSION['tipo'] = $tipo;
                    $info = array('usuario'=> $us, 'tipo' => $tipo);
                    return $info;
                }
            }else{
                $info[0] = "asd";
                return $info;
            }
        
        }else{
            $info[0] = "asd";
            return $info;
        }
    }
    function Register($tipo,$us,$ci,$año,$apellido,$Institucion,$Nombre,$Contacto,$Contrasenia,$Nacimiento,$Mail){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL login(?,?,?,?,?,?,?,?,?,?,?,@x)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("isiisssssss",$tipo,$us,$ci,$año,$apellido,$Institucion,$Nombre,$Contacto,$Contrasenia,$Nacimiento,$Mail);
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
        $info = array();
        $sql = "CALL login(?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("s",$usuario);
    }
    function AgregarUsuario($tipo,$us,$ci,$año,$apellido,$Institucion,$Nombre,$Contacto,$Contrasenia,$Nacimiento,$Mail){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL AgregarUsuario(?,?,?,?,?,?,?,?,?,?,?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("isiisssssss",$tipo,$us,$ci,$año,$apellido,$Institucion,$Nombre,$Contacto,$Contrasenia,$Nacimiento,$Mail);
    }
}
?>