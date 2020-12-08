<?php

class crud {

    public function agregar($datos) {
        $obj = new Conexion();
        $conexion = $obj->conectar();
        $sql = "INSERT into t_gastos (concepto_gasto,cantidad,fecha)
									values ('$datos[0]',
											'$datos[1]',
											'$datos[2]')";
        return mysqli_query($conexion, $sql);
    }

    public function obtenDatos($id) {
        $obj = new Conexion();
        $conexion = $obj->conectar();

        $sql = "SELECT * from t_gastos
					where id='$id'";
        $result = mysqli_query($conexion, $sql);
        $ver = mysqli_fetch_row($result);

        $datos = array(
            'id' => $ver[0],
            'concepto_gasto' => $ver[1],
            'cantidad' => $ver[2],
            'fecha' => $ver[3]
        );
        return $datos;
    }

    public function actualizar($datos) {
        $obj = new Conexion();
        $conexion = $obj->conectar();

        $sql = "UPDATE t_gastos set concepto_gasto='$datos[0]',
	cantidad='$datos[1]',
        fecha='$datos[2]'
	where id='$datos[3]'";
        return mysqli_query($conexion, $sql);
    }


    public function eliminar($idjuego) {
        $obj = new Conexion();
        $conexion = $obj->conectar();

        $sql = "DELETE from t_gastos where id='$idjuego'";
        return mysqli_query($conexion, $sql);
    }

}
?>

