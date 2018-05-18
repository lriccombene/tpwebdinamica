<?php

namespace app;
// INCLUIR CLASES NECESARIAS
require_once("Persona.php");

/**
 * Description of Helpers
 *
 * @author mariano
 */
namespace app;

class Helpers 
{
    //agrego el metodo constructor por defecto
    public function __construct() {} 
    
    public static function listaPersonas()
    {        
        $persona1 = new Persona('mariano', 38, 'M', 180);
        $persona2 = new Persona('juan', 5, 'M', 110);
        $persona3 = new Persona('ivan', 15, 'M', 170);
        $persona4 = new Persona('valeria', 37, 'F', 160);
        $persona5 = new Persona('berenice', 18, 'F', 160);
        return [
            $persona1, $persona2, $persona3, $persona4, $persona5
        ];
    }
    
    // se agregar el :array para el return
    public static function listaSexos(): array
    {
        return [
            ''=>'Todos',
            'M'=>'Masculino',
            'F'=>'Femenino'
            ];
    }
    // se agregar el :array para el return
    public static function listaAlturas(): array
    {
        return [
            'A'=>'Altos',
            'I'=>'Intermedios',
            'B'=>'Bajos'
            ];
    }
    
    // Este sería un buen lugar para generar un método que genere una lista de opciones
    
    //se crea metodo para ser utilizado por el filtro o boton que se encuentra en el formulario
        public static function obtenerListaPersonasFiltrada(array $parametros): array 
    {
        $listaResultado = [];
        foreach(self::listaPersonas() as $persona)
        {
            
            //la primera condicionesta para cuando se carga por primera vez ela pagiana
            //y no tenemos parametros esto va acompañado de la propiedad del boton name 
            if( !(array_key_exists('boton', $parametros)) || $parametros['nombre']==$persona->getNombre() ||  $parametros['nombre']==""){
			$listaResultado[] = $persona;
		}        
        }
        return $listaResultado;
        
    }
    
}
