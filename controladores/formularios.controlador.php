<?php


class ControladorFormularios{
    /*
    __________________________________
    REGISTRO
    __________________________________
    */
    static public function ctrRegistro(){
        if(isset($_POST["registroNombre"])){
            $tabla = "registros";
            $datos = array("nombre" => $_POST["registroNombre"],
                            "email" => $_POST["registroMail"],
                            "password" => $_POST["registroPassword"]);
            $respuesta = ModeloFormularios::mdlRegistro($tabla,$datos);
            return $respuesta;
        }
    }
    /*
    __________________________________
    SELECCIONAR REGISTROS PROFESORES
    __________________________________
    */
    static public function ctrSeleccionarRegistros($item, $valor){
        $tabla = "registros";
        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
        return $respuesta;
    }
    /*
    __________________________________
    INGRESo
    __________________________________
    */

    public function ctrIngreso(){

        if(isset($_POST["ingresoEmail"])){
            
            $tabla = "registros";
            $item = "email";
            $valor = $_POST["ingresoEmail"];
            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
            if(isset($respuesta["email"])==null){
                echo '<script>
                if (window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
            
                </script>';
                echo '<div class="alert alert-danger"> El usuario no está registrado.</div>';
            }else{
                if($respuesta["email"]     == $_POST["ingresoEmail"] 
                && $respuesta["password"]  == $_POST["ingresoPassword"]){
                    
                    $_SESSION["validarIngreso"] = "ok";

                    echo '<script>

                        if (window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);

                        }
                        window.location = "index.php?pagina=inicio";
                   </script>';
                }else{
                    echo '<script>
                        if (window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);

                        }
            
                     </script>';
                    echo '<div class="alert alert-success"> El usuario ha sido registrado exitosamente.</div>';
                }
            }
        }

    }

    /*
    __________________________________
    ACTUALIZAR REGISTRO
    __________________________________
    */
    static public function ctrActualizarRegistro(){
        if(isset($_POST["actualizarNombre"])){
            if($_POST["actualizarPassword"] != ""){
                $password = $_POST["actualizarPassword"];
            }else{
                $password = $_POST["passwordActual"];
            }
            $tabla = "registros";
            $datos = array("id" => $_POST["idUsuario"],
                            "nombre" => $_POST["actualizarNombre"],
                            "email" => $_POST["actualizarMail"],
                            "password" => $password);
            $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla,$datos);
            return $respuesta;              
            }
        }

    /*
    __________________________________
    ELIMINAR REGISTRO
    __________________________________
    */
    public function ctrEliminarRegistro(){
        if(isset($_POST["eliminarRegistro"])){
            $tabla = "registros";
            $valor = $_POST["eliminarRegistro"];            
            $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);
            if($respuesta == "ok"){
                echo '<script>
                    if (window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?pagina=inicio";
                </script>';
            }
        }
    }
        /*
    __________________________________
    SELECCIONAR REGISTROS ALUMNOS
    __________________________________
    */
    static public function ctrSeleccionarRegistrosAlumnos($item, $valor){
        $tabla = "alumnos";
        $table = "notas";
        $respuesta = ModeloFormularios::mdlSeleccionarRegistrosAlumnos($tabla, $table, $item, $valor);
        return $respuesta;
    }
    /*
    __________________________________
    REGISTRO ALUMNOS
    __________________________________
    */
    static public function ctrRegistroAlumnos(){
        if(isset($_POST["crearRut"])){
            $tabla = "alumnos";
            $table = "notas";
            $datos = array("rut" => $_POST["crearRut"],
                            "nombre" => $_POST["crearNombre"],
                            "apellido" => $_POST["crearApellido"],
                            "fecha_nac" => $_POST["crearFecha"]);
            $respuesta = ModeloFormularios::mdlRegistroAlumno($tabla, $table, $datos);
            return $respuesta;
        }
    }
    /*
    __________________________________
    SELECCIONAR REGISTROS NOTAS
    __________________________________
    */
    static public function ctrSeleccionarNotas($item, $valor){
        $tabla = "notas";
        $respuesta = ModeloFormularios::mdlSeleccionarNotas($tabla, $item, $valor);
        return $respuesta;
    }
        /*
    __________________________________
    ACTUALIZAR NOTA
    __________________________________
    */
    static public function ctrActualizarNota(){
        if(isset($_POST["actualizarNota1"])){
            $tabla = "notas";
            $datos = array("nota1" => $_POST["actualizarNota1"],
                            "nota2" => $_POST["actualizarNota2"],
                            "nota3" => $_POST["actualizarNota3"],
                            "nota4" => $_POST["actualizarNota4"],
                            "id_alumno" => $_POST["IDalumno"]);
            $respuesta = ModeloFormularios::mdlActualizarNota($tabla,$datos);
            return $respuesta;              
            }
        }
    /*
    __________________________________
    ELIMINAR REGISTRO
    __________________________________
    */
    public function ctrEliminarAlumno(){
        if(isset($_POST["eliminarAlumno"])){
            $tabla = "alumnos";
            $valor = $_POST["eliminarAlumno"];            
            $respuesta = ModeloFormularios::mdlEliminarAlumno($tabla, $valor);
            if($respuesta == "ok"){
                echo '<script>
                    if (window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?pagina=listadoalumnos";
                </script>';
            }
        }
    }

}
?>