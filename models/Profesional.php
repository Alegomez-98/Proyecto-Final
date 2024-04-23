<?php

namespace Model;

class Profesional extends ActiveRecord{
    protected static $tabla = "profesionales";
    protected static $columnasDB = ["id", "nombre", "apellido", "especializado", "graduado", "imagen", "descripcion"];

    public $id;
    public $nombre;
    public $apellido;
    public $especializado;
    public $graduado;
    public $imagen;
    public $descripcion;

    public function __construct($args = [])
    {
        
        $this->id = $args["id"] ?? null;
        $this->nombre = $args["nombre"] ?? "";
        $this->apellido = $args["apellido"] ?? "";
        $this->especializado = $args["especializado"] ?? "";
        $this->graduado = $args["graduado"] ?? "";
        $this->imagen = $args["imagen"] ?? "";
        $this->descripcion = $args["descripcion"] ?? "";
      

    }

    public function validar(){
        if(!$this->nombre){
            self::$errores[] = "Debes añadir un nombre";   
        }
        
        if(!$this->apellido){
            self::$errores[] = "Debes indicar un apellido";   
        }
        
        
        if(!$this->especializado){
            self::$errores[] = "Debes indicar la especialización del profesional";   
        }

        if(!$this->graduado){
            self::$errores[] = "Debes indicar de qué y dónde se graduó";   
        }

        if(!$this->descripcion){
            self::$errores[] = "La descripción del profesionales obligatoria";   
        }

        if (!$this->imagen){
            self::$errores[] = "La Imagen del profesional es obligatoria";
        }

        

        return self::$errores;
       
    }
   

}