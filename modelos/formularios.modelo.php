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
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha
            FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt -> fetchAll();    
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha
            FROM $tabla WHERE $item = :$item ORDER BY id DESC");
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
    static public function mdlSeleccionarRegistrosAlumnos($tabla, $table, $item, $valor){

        if($item == null && $valor == null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla a, $table n WHERE a.rut = n.id_alumno ");
            $stmt->execute();
            return $stmt -> fetchAll();
        }
        else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla a, $table n WHERE a.rut = n.id_alumno ");
            $stmt-> bindParam(":".$item,$valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt -> fetch();    
        }
        $stmt = null;
    }
    /*=====================
    REGISTRO ALUMNO
    =====================*/
    static public function mdlRegistroAlumno($tabla, $table, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(rut, nombre, apellido, fecha_nac) 
        VALUES(:rut, :nombre, :apellido, :fecha_nac); INSERT INTO $table(nota1,nota2,nota3,nota4,promedio,id_alumno) VALUES ('0','0','0','0','0',:rut) ");
        $stmt-> bindParam(":rut",$datos["rut"], PDO::PARAM_STR);
        $stmt-> bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
        $stmt-> bindParam(":apellido",$datos["apellido"], PDO::PARAM_STR);
        $stmt-> bindParam(":fecha_nac",$datos["fecha_nac"], PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }
    /*
    __________________________________
    SELECCIONAR REGISTROS NOTAS
    __________________________________  
    */
    static public function mdlSeleccionarNotas($tabla, $item, $valor){
        if($item == null && $valor == null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt -> fetchAll();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt-> bindParam(":".$item,$valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt -> fetch();
        }
        $stmt = null;
    }
    /*=====================
    ACTUALIZAR REGISTRO PROFES
    =====================*/
    static public function mdlActualizarNota($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nota1=:nota1, nota2=:nota2, nota3=:nota3, nota4=:nota4 WHERE id_alumno= :id_alumno");
        $stmt-> bindParam(":nota1",$datos["nota1"], PDO::PARAM_INT);
        $stmt-> bindParam(":nota2",$datos["nota2"], PDO::PARAM_INT);
        $stmt-> bindParam(":nota3",$datos["nota3"], PDO::PARAM_INT);
        $stmt-> bindParam(":nota4",$datos["nota4"], PDO::PARAM_INT);
        $stmt-> bindParam(":id_alumno",$datos["id_alumno"], PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }
    /*=====================
    ELMINAR REGISTRO
    =====================*/
    static public function mdlEliminarAlumno($tabla, $valor){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $tabla.rut = :rut");
        $stmt-> bindParam(":rut",$valor, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }
}
?>