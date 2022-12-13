<?php


class ControladorFormularios{
    /*
    __________________________________
    REGISTRO USUARIOS
    __________________________________
    */
    static public function ctrRegistro(){
        if(isset($_POST["registroNombre"])){
            $tabla = "registros";
            $datos = array("nombre" => $_POST["registroNombre"],
                            "email" => $_POST["registroMail"],
                            "password" => $_POST["registroPassword"],
                            "rol" => $_POST["registroRol"]);
            $respuesta = ModeloFormularios::mdlRegistro($tabla,$datos);
            return $respuesta;
        }
    }
    /*
    __________________________________
    VISUALIZAR INVENTARIO
    __________________________________
    */
    static public function ctrSeleccionarRegistros($item, $valor){
        $tabla = "registros";
        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
        return $respuesta;
    }
    /*
    __________________________________
    INGRESO A SISTEMA
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
                    echo '<div class="alert alert-danger"> El usuario está registrado y la clave es incorrecta.</div>';
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
    SELECCIONAR REGISTROS PRODUCTOS
    __________________________________
    */
    static public function ctrSeleccionarRegistroProductos($item, $valor){
        $tabla = "productos";
        $table = "categorias";
        $respuesta = ModeloFormularios::mdlSeleccionarRegistroProductos($tabla, $table, $item, $valor);
        return $respuesta;
    }
    /*
    __________________________________
    REGISTRO PRODUCTOS
    __________________________________
    */
    static public function ctrRegistroProductos(){
        if(isset($_POST["crearSKU"])){
            $tabla = "productos";
            $datos = array("SKU" => $_POST["crearSKU"],
                            "nombre_producto" => $_POST["crearNombre"],
                            "id_categoria" => $_POST["crearCategoria"],
                            "precio_costo" => $_POST["crearPrecioCosto"],
                            "precio_venta" => $_POST["crearPrecioVenta"]);
            $respuesta = ModeloFormularios::mdlRegistroProducto($tabla,$datos);
            return $respuesta;
        }
    }
        /*
    __________________________________
    ACTUALIZAR PRODUCTOS
    __________________________________
    */
    static public function ctrActualizarProducto(){
        if(isset($_POST["actualizarSKU"])){
            $tabla = "productos";
            $datos = array("SKU" => $_POST["actualizarSKU"],
                            "nombre_producto" => $_POST["actualizarNombre"],
                            "id_categoria" => $_POST["actualizarCategoria"],
                            "precio_costo" => $_POST["actualizarPrecioCosto"],
                            "precio_venta" => $_POST["actualizarPrecioVenta"],
                            "stockactual" => $_POST["actualizarStockActual"],
                            "id" => $_POST["id"]                        
                        );
            $respuesta = ModeloFormularios::mdlActualizarProducto($tabla,$datos);
            return $respuesta;              
            }
        }
    /*
    __________________________________
    ELIMINAR REGISTRO
    __________________________________
    */
    public function ctrEliminarProducto(){
        if(isset($_POST["eliminarProducto"])){
            $tabla = "productos";
            $valor = $_POST["eliminarProducto"];            
            $respuesta = ModeloFormularios::mdlEliminarProducto($tabla, $valor);
            if($respuesta == "ok"){
                echo '<script>
                    if (window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?pagina=eliminarproducto";
                
                </script>
                echo <div class="alert alert-success"> El producto ha sido eliminado.</div>';;
                
            }
        }
    }
/*
    __________________________________
    SELECCIONAR CATEGORIA
    __________________________________
    */
    static public function ctrSeleccionarCategorias($query){
        $tabla = "categorias";
        $respuesta = ModeloFormularios::mdlSeleccionarCategorias($tabla, $query);
        return $respuesta;  
    }                                                                                                           
}
?>