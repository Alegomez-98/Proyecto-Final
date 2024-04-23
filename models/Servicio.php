<?php

namespace Model;

class Servicio extends ActiveRecord {
    protected static $tabla = "servicios";
    protected static $columnasDB = ["id", "titulo", "precio", "menu", "pautas", "revision", "contacto", "lista", "receta", "profesionales_id"];

    public $id;
    public $titulo;
    public $precio;
    public $menu;
    public $pautas;
    public $revision;
    public $contacto;
    public $lista;
    public $receta;
    public $profesionales_id;

    public function __construct($args = [])
    {
        
        $this->id = $args["id"] ?? null;
        $this->titulo = $args["titulo"] ?? "";
        $this->precio = $args["precio"] ?? "";
        $this->menu = $args["menu"] ?? "";
        $this->pautas = $args["pautas"] ?? "";
        $this->revision = $args["revision"] ?? "";
        $this->contacto = $args["contacto"] ?? "";
        $this->lista = $args["lista"] ?? "";
        $this->receta = $args["receta"] ?? "";
        $this->profesionales_id = $args["profesionales_id"] ?? "";

    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un título";   
        }
        
        if(!$this->precio){
            self::$errores[] = "Debes indicar un precio";   
        }
        
        
        if(!$this->menu){
            self::$errores[] = "La descripción del menú es obligatoria";   
        }

        if(!$this->pautas){
            self::$errores[] = "La descripción de las pautas es obligatoria";   
        }

        if(!$this->revision){
            self::$errores[] = "La descripción de la revisión es obligatoria";   
        }

        if(!$this->contacto){
            self::$errores[] = "La descripción del contacto es obligatoria";   
        }

        if(!$this->lista){
            self::$errores[] = "La descripción de la lista es obligatoria";   
        }

        if(!$this->receta){
            self::$errores[] = "La descripción de la receta es obligatoria";   
        }
        
        if(!$this->profesionales_id){
            self::$errores[] = "Elige un profesional";   
        }

        return self::$errores;
       
    }
}

?>