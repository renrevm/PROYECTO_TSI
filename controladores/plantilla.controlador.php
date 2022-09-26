<?php

Class ControladorPlantilla{
    /*=============================
    Llamada a la plantilla
    =============================*/
    public function ctrTraerPlantilla(){
        #include() #se utiliza para invocar el archivo que contiene código html-php.
        include "vistas/plantilla.php";
        
    }
}