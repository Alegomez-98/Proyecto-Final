<?php

namespace Model;

class Entrada extends ActiveRecord{

    protected static $tabla = "entrada";
    protected static $columnasDB = ["id", "titulo", "fecha", "cabecera", "imagen", "descripcion"];

    public $id;
    public $titulo;
    public $fecha;
    public $cabecera;
    public $imagen;
    public $descripcion;

    public function __construct($args = [])
    {
        
        $this->id = $args["id"] ?? null;
        $this->titulo = $args["titulo"] ?? "";
        $this->fecha = $args["fecha"] ?? "";
        $this->cabecera = $args["cabecera"] ?? "";
        $this->imagen = $args["imagen"] ?? "";
        $this->descripcion = $args["descripcion"] ?? "";
      

    }


    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un titulo";   
        }

        if(!$this->fecha){
            self::$errores[] = "Debes indicar la fecha de la entrada";   
        }

        
        if(!$this->cabecera){
            self::$errores[] = "Debes añadir una cabecera";   
        }
        
               
        if(!$this->descripcion){
            self::$errores[] = "La descripción de la entada es obligatoria";   
        }

        if (!$this->imagen){
            self::$errores[] = "La Imagen de la entrada es obligatoria";
        }

        

        return self::$errores;
       
    }
}
