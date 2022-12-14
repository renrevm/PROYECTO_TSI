<?php
function obtenerProductos()
{
    $stmt = Conexion::conectar()->prepare("SELECT MAX(id) FROM ventas");
    $stmt->execute();
    return $stmt -> fetch();

}
?>