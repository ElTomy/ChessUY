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
            $stmts->bind_result($ci,$us,$pas,$mat);
            if($stmts->fetch()){
                if($us == null){
                    $stmts->close();
                    return false;
                }else{
                    $stmts->close();
                    session_start();
                    $_SESSION['ci'] = $ci;
                    $_SESSION['matricula'] = $mat;
                    $info = array('ci'=> $ci, 'matricula' => $mat);
                    return $info;
                }
            }else{
                return false;
            }
        
        }else{
            return false;
        }
        }


}

?>