<?php

namespace Model;

class Producto extends ActiveRecord{

    protected static $tabla = "productos";
    protected static $columnasDB = ["id", "imagen", "titulo", "descripcion", "encontrado"];

    public $id;
    public $imagen;
    public $titulo;
    public $descripcion;
    public $encontrado;
    

    public function __construct($args = [])
    {
        
        $this->id = $args["id"] ?? null;
        $this->imagen = $args["imagen"] ?? "";
        $this->titulo = $args["titulo"] ?? "";
        $this->descripcion = $args["descripcion"] ?? ""; 
        $this->encontrado = $args["encontrado"] ?? "";
        
        
      

    }


    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un titulo";   
        }

        if(!$this->descripcion){
            self::$errores[] = "La descripción del producto es obligatoria";   
        }
        
        if(!$this->encontrado){
            self::$errores[] = "Debes añadir dónde se puede encontrar el producto";
        }
        
        
        if (!$this->imagen){
            self::$errores[] = "La Imagen del producto es obligatoria";
        }

        return self::$errores;
       
    }
}
