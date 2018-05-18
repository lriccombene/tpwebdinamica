<?php

namespace app;
require_once("Helpers.php");
//$obj_helpers = new app\Helpers; // 

// INCLUIR CLASES NECESARIAS

/**
 * Description of Persona
 *
 * @author mariano
 */
class Persona {
    private $nombre;
    private $edad;
    private $sexo;
    private $altura;
    
    public function __construct(string $nombre, int $edad, string $sexo, int $altura) 
    {
        // completar
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->sexo = $sexo;
            $this->altura = $altura;
       
    }
    
    /**
     * Es mayor de edad si su edad es mayor que 17
     * @return string la expresión SI o NO 
     */
    public function esMayorEdad(int $edad)
    {
        // completar
        if($edad < 17){
           return "NO";     
        }else{
           return "SI"; 
        }
        
    }
    
    /**
     * Una persona es Alta si mide más de 170, intermedia si está entre
     * 140 y 170 y baja si mide menos de 140
     * @return string el código de la altura de acuerdo a la lista de opciones
     */
    public function getValorRangoAltura(int $altura)
    {
        // completar
        if($altura >=170){
            return "A";
        }
        if($altura>=140 && $altura < 170){
            return "I";
        }
        if($altura<140){
            return "B";
        }
        
    }

    /**
     * @return string la descripción del código de la altura
     */
    public function getDescripcionRangoAltura(string $codigo)
    {
        // completar
        $array_altura= \app\Helpers::listaAlturas();
        return $array_rango[$codigo];
        //$array_rango = $obj_helpers::listaAlturas();
        //return $array_rango[$codigo];
    }
    
    public function getDescripcionSexo(string $codigo)
    {
        // completar
        $array_sexo = $obj_helpers::listaSexos();
        return $array_sexo[$codigo];
    }
    
    function getNombre() 
    {
        return $this->nombre;
    }

    function getEdad() 
    {
        return $this->edad;
    }

    function getSexo() 
    {
        return $this->sexo;
    }

    function getAltura() 
    {
        return $this->altura;
    }

    function setNombre($nombre) 
    {
        $this->nombre = $nombre;
    }

    function setEdad($edad) 
    {
        $this->edad = $edad;
    }

    function setSexo($sexo) 
    {
        $this->sexo = $sexo;
    }

    function setAltura($altura) 
    {
        $this->altura = $altura;
    }


    
}
