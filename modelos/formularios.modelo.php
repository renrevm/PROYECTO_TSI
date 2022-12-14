<?php
require_once "conexion.php";
class ModeloFormularios{
    /*=====================
    REGISTRO
    =====================*/
    static public function mdlRegistro($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, password, rol) 
        VALUES(:nombre, :email, :password, :rol)");
        $stmt-> bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
        $stmt-> bindParam(":email",$datos["email"], PDO::PARAM_STR);
        $stmt-> bindParam(":password",$datos["password"], PDO::PARAM_STR);
        $stmt-> bindParam(":rol",$datos["rol"], PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }
    /*
    __________________________________
    SELECCIONAR REGISTROS PRODUCTOS
    __________________________________  
    */
    static public function mdlSeleccionarRegistros($tabla, $item, $valor){
        if($item == null && $valor == null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt -> fetchAll();    
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
            $stmt-> bindParam(":".$item,$valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt -> fetch();    
        }
        $stmt = null;
    }
    /*=====================
    ACTUALIZAR REGISTRO PRODUCTOS
    =====================*/
    static public function mdlActualizarRegistro($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, email=:email, password=:password WHERE id= :id ");
        $stmt-> bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
        $stmt-> bindParam(":email",$datos["email"], PDO::PARAM_STR);
        $stmt-> bindParam(":password",$datos["password"], PDO::PARAM_STR);
        $stmt-> bindParam(":id",$datos["id"], PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }
    /*=====================
    ELMINAR REGISTRO
    =====================*/
    static public function mdlEliminarRegistro($tabla, $valor){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt-> bindParam(":id",$valor, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }
    /*
    __________________________________
    SELECCIONAR REGISTROS ALUMNOS
    __________________________________  
    */
    static public function mdlSeleccionarRegistroProductos($tabla, $table, $item, $valor){
        if($item == null && $valor == null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla t, $table c WHERE c.id = t.id_categoria and t.deleted_at is null");
            $stmt->execute();
            return $stmt -> fetchAll();    
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla t, $table c WHERE c.id = t.id_categoria AND t.$item = :$item");
            $stmt-> bindParam(":".$item,$valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt -> fetch();    
        }
        $stmt = null;
    }
    /*=====================
    CREAR PRODUCTO
    =====================*/
    static public function mdlRegistroProducto($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(SKU, nombre_producto, id_categoria, precio_costo, precio_venta, stockactual) 
        VALUES(:SKU, :nombre_producto, :id_categoria, :precio_costo, :precio_venta, 0)");
        $stmt-> bindParam(":SKU",$datos["SKU"], PDO::PARAM_INT);
        $stmt-> bindParam(":nombre_producto",$datos["nombre_producto"], PDO::PARAM_STR);
        $stmt-> bindParam(":id_categoria",$datos["id_categoria"], PDO::PARAM_STR);
        $stmt-> bindParam(":precio_costo",$datos["precio_costo"], PDO::PARAM_INT);
        $stmt-> bindParam(":precio_venta",$datos["precio_venta"], PDO::PARAM_INT);
        //$stmt-> bindParam(":stockactual",$datos["stockactual"], PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }
    /*=====================
    ACTUALIZAR REGISTRO PRODUCTO
    =====================*/
    static public function mdlActualizarProducto($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET SKU=:SKU, nombre_producto=:nombre_producto, id_categoria=:id_categoria, precio_costo=:precio_costo, precio_venta=:precio_venta,
        stockactual=:stockactual WHERE SKU= :SKU");
        $stmt-> bindParam(":SKU",$datos["SKU"], PDO::PARAM_INT);
        $stmt-> bindParam(":nombre_producto",$datos["nombre_producto"], PDO::PARAM_STR);
        $stmt-> bindParam(":id_categoria",$datos["id_categoria"], PDO::PARAM_STR);
        $stmt-> bindParam(":precio_costo",$datos["precio_costo"], PDO::PARAM_INT);
        $stmt-> bindParam(":precio_venta",$datos["precio_venta"], PDO::PARAM_INT);
        $stmt-> bindParam(":stockactual",$datos["stockactual"], PDO::PARAM_INT);
        $stmt-> bindParam(":id",$datos["id"], PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }
    /*=====================
    ELMINAR REGISTRO
    =====================*/
    static public function mdlEliminarProducto($tabla, $valor){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET deleted_at=CURRENT_TIMESTAMP() WHERE SKU = :SKU");
        $stmt-> bindParam(":SKU",$valor, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }
        /*=====================
    seleccionar categoría
    =====================*/
    static public function mdlSeleccionarCategoria($tabla, $query){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $query");
        $stmt->execute();
        dd($stmt);
        return $stmt -> fetchAll();
    }
/*=====================
    añadir al carro
    INSERT INTO `det_ventas` (`producto_id`, `venta_id`, `precio_unitario`, `deleted_at`) VALUES ('3', '2', '50000', NULL);
    =====================*/
    static public function mdlAnadirAlCarro($table, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $table(producto_id, venta_id, precio_unitario) 
        VALUES (:producto_id, 1, :precio_unitario)");
        $stmt-> bindParam(":producto_id",$datos["producto_id"], PDO::PARAM_INT);
        $stmt-> bindParam(":precio_unitario",$datos["precio_unitario"], PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }
    /*=====================
    obtener id de producto
    SELECT id FROM `productos` WHERE SKU = 123456;
    =====================*/
    static public function mdlSeleccionarProd($tabla, $item, $valor){
        if($item == null && $valor == null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt -> fetchAll();    
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
            $stmt-> bindParam(":".$item,$valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt -> fetch();    
        }
        $stmt = null;
    }
    /*=====================
    obtener id de venta
    SELECT id FROM `ventas` ORDER BY id DESC LIMIT 1;
    function obtenerProductos()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT id, nombre, descripcion, precio FROM productos");
    return $sentencia->fetchAll();
}
    =====================*/
    static public function mdlSeleccionarIdVenta($tabla, $item, $valor){
        if($item == null && $valor == null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt -> fetchAll();    
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
            $stmt-> bindParam(":".$item,$valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt -> fetch();    
        }
        $stmt = null;
    }
    /*=====================
    mostrar carrito
    ------------------*/
    static public function mdlMostrarCarrito($tabla, $table, $item, $valor){
        if($item == null && $valor == null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla t, $table c WHERE c.id = t.producto_id");
            $stmt->execute();
            return $stmt -> fetchAll();    
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla t, $table c WHERE c.id = t.id_categoria AND t.$item = :$item");
            $stmt-> bindParam(":".$item,$valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt -> fetch();    
        }
        $stmt = null;
    }
    /*=====================
    quitar del carro
    ------------------*/
    static public function mdlQuitarDelCarroCompra($tabla, $valor){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE producto_id = :producto_id");
        $stmt-> bindParam(":producto_id",$valor, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }
    static public function mdlQuitarDelCarroVenta($tabla, $valor){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE producto_id = :producto_id");
        $stmt-> bindParam(":producto_id",$valor, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }
}

?>