<?php
require_once 'Conexion.php';
class Usuarios extends Conexion{
    public function agregarUsuario($nombre,$apellido,$email,$usuario, $password){
        $conexion=Conexion::conectar();
        $password=sha1($password);
        $sql="insert into t_usuarios (nombre,apellido_m,email,usuario, password)  values ('$nombre','$apellido',
                                                                                           '$email','$usuario',
                                                                                            '$password')";
        $result= mysqli_query($conexion, $sql);
        return $result;


    }

    public function login($usuario,$password){
        $conexion = Conexion::conectar();
        $password=sha1($password);
        $sql="select count(*) as total from t_usuarios where usuario = '$usuario' and password = '$password'";
        $result= mysqli_query($conexion, $sql);
        $datos= mysqli_fetch_array($result);

        if($datos['total'] > 0){
            $_SESSION['usuario']=$usuario;
            header("location:../../vistas/inicio.php");

        }else{
            header("location:../../index.php");

        }


    }


}


?>