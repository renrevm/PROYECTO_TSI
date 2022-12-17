<?php
if (!isset($_POST["codigo"])) {
    return;
}

$codigo = $_POST["codigo"];
include_once "conexion2.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE SKU = ? LIMIT 1;");
$sentencia->execute([$codigo]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);

if (!$producto) {
    header("Location: ./vistas/paginas/vender.php?status=4");
    exit;
}

if ($producto->existencia < 1) {
    header("Location: ./vistas./paginas/vender.php?status=5");
    exit;
}
session_start();

$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->codigo === $codigo) {
        $indice = $i;
        break;
    }
}

if ($indice === false) {
    $producto->cantidad = 1;
    $producto->total = $producto->precioVenta;
    array_push($_SESSION["carrito"], $producto);
} else {
    $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
    if ($cantidadExistente + 1 > $producto->existencia) {
        header("Location: ./vistas/paginas/vender.php?status=5");
        exit;
    }
    $_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precioVenta;
}
header("Location: ./vistas/paginas/vender.php");
