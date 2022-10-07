<?php
require_once "conexion.php";
class ModeloFormularios{
    /*=====================
    REGISTRO
    =====================*/
    static public function mdlRegistro($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, password) 
        VALUES(:nombre, :email, :password)");
        $stmt-> bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
        $stmt-> bindParam(":email",$datos["email"], PDO::PARAM_STR);
        $stmt-> bindParam(":password",$datos["password"], PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }
    /*
    __________________________________
    SELECCIONAR REGISTROS PROFESORES
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
    ACTUALIZAR REGISTRO PROFES
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
    static public function mdlSeleccionarRegistroProductos($tabla, $item, $valor){

        if($item == null && $valor == null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt -> fetchAll();
        }
        else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
            $stmt-> bindParam(":".$item,$valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt -> fetch();
        }
        $stmt = null;
    }
    /*=====================
    CREAR PRODUCTO
    =====================*/
    static public function mdlRegistroProductos($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(SKU, nombre_prod, categoria, precio_costo, precio_venta, stockactual) VALUES(:SKU, :nombre_prod, :categoria, :precio_costo, :precio_venta, 0)");
        $stmt-> bindParam(":SKU",$datos["SKU"], PDO::PARAM_INT);
        $stmt-> bindParam(":nombre_prod",$datos["nombre"], PDO::PARAM_STR);
        $stmt-> bindParam(":categoria",$datos["categoria"], PDO::PARAM_STR);
        $stmt-> bindParam(":precio_costo",$datos["precio_costo"], PDO::PARAM_INT);
        $stmt-> bindParam(":precio_venta",$datos["precio_venta"], PDO::PARAM_INT);
      //  $stmt-> bindParam(":stockactual",$datos['stockactual'], PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }

    /*=====================
    ACTUALIZAR REGISTRO PROFES
    =====================*/
    static public function mdlActualizarProducto($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET SKU=:SKU, nombre_prod=:nombre_prod, categoria=:categoria, precio_costo=:precio_costo, precio_venta=:precio_venta,
        stockactual=:stockactual WHERE id= :id");
        $stmt-> bindParam(":SKU",$datos["SKU"], PDO::PARAM_INT);
        $stmt-> bindParam(":nombre_prod",$datos["nombre_prod"], PDO::PARAM_STR);
        $stmt-> bindParam(":categoria",$datos["categoria"], PDO::PARAM_STR);
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
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $tabla.id = :id");
        $stmt-> bindParam(":id",$valor, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }
}
?>