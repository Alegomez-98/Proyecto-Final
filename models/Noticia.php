<?php

namespace Model;

class Noticia extends ActiveRecord{

    protected static $tabla = "noticias";
    protected static $columnasDB = ["id", "titulo", "cabecera", "imagen", "autor", "fecha", "descripcion"];

    public $id;
    public $titulo;
    public $cabecera;
    public $imagen;
    public $autor;
    public $fecha;
    public $descripcion;

    public function __construct($args = [])
    {
        
        $this->id = $args["id"] ?? null;
        $this->titulo = $args["titulo"] ?? "";
        $this->cabecera = $args["cabecera"] ?? "";
        $this->imagen = $args["imagen"] ?? "";
        $this->autor = $args["autor"] ?? "";
        $this->fecha = $args["fecha"] ?? "";
        $this->descripcion = $args["descripcion"] ?? "";
      

    }


    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un titulo";   
        }
        
        if(!$this->cabecera){
            self::$errores[] = "Debes añadir una cabecera";   
        }
        
        
        if(!$this->autor){
            self::$errores[] = "Debes indicar el autor de la notica";   
        }

        if(!$this->fecha){
            self::$errores[] = "Debes indicar la fecha de la notica";   
        }

        if(!$this->descripcion){
            self::$errores[] = "La descripción de la noticia es obligatoria";   
        }

        if (!$this->imagen){
            self::$errores[] = "La Imagen de la noticia es obligatoria";
        }

        

        return self::$errores;
       
    }

}