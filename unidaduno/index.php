<?php
//nos informa LOS NIVELES DE ERRORLa función error_reporting() establece la 
//directiva error_reporting en tiempo de ejecución. PHP tiene varios niveles 
//de errores para notificar, al utilizar ésta función se define el nivel de 
//duración (tiempo de ejecución) de sus scripts. Si el parámetro opcional 
//level no se define, la función error_reporting() sólo devolverá el nivel 
//actual de notificación de error.
error_reporting(E_ALL);

//Establece el valor de la directiva de configuración dada. La opción de 
//configuración mantendrá este nuevo valor durante la ejecución del script,
// y se restaurará cuando acabe el mismo.
ini_set('display_errors', 'stdout');
//MODULARIZA la pagina
require_once 'header.php';
require_once 'Helpers.php';
$obj_helpers = new app\Helpers;


?>
        <header><h3>Práctico Evaluativo</h3></header>
        <section class="contenido">
            <div class="formulario">
                <!--
                    Pueden utilizar la clase Helpers para agregar más métodos, por ejemplo
                    quizás les sería útil un método que genere algunos inputs de radio o check,
                    y que se encargue de setear el valor que viene en el formulario
                -->
                <form action="" method="get">
                    <div class="formGroup">
                        <!-- Nombre -->
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php 
							if(isset($_GET["nombre"])){
								echo $_GET['nombre'];
							}else {
								echo "";
							} 
							?>"/>
                    </div>
                    <div class="formGroup">
                        <!-- 
                        Sexo Toma los valores  de listaSexos, permite 1 sola opción
                        Se deben generar los input a partir de la lista
                        -->
                        <label for="">Sexo : </label>
                        <?php
                            foreach ($obj_helpers::listaSexos() as $value2) {
                                echo "<label>$value2</label><input type='radio' name='sexo' id='sexo' >";
                        }
                        ?>
                    </div>
                    <div class="formGroup">
                        <!--
                        Altura toma las opciones de listaAlturas, permite múltiples 
                        Se deben generar los inputs a partir de la lista
                        -->
                        <label for="">Altura : </label>
                        <?php
                            foreach ($obj_helpers::listaAlturas() as $key => $value) {
                                echo "<label>$key. $value</label><input type='checkbox' name='altura' id='altura'>";
                        }
                        ?>
                        
                        
                    </div>
                    <div class="formGroup">
                        <!--
                         Mayores de edad? completar de manera estática, recordando la estrategia
                         para determinar si el valor fue seleccionado
                        -->
                        <label for="">¿Es Mayor?</label>
                        <select name="mayor" id="mayor">
                            <option value="S" <?= !empty($_GET['mayor']) && $_GET['mayor']=='S'?'selected':'';  ?>  > SI </option>
                            <option value="N" <?= !empty($_GET['mayor']) && $_GET['mayor']=='N'?'selected':'';  ?>  > NO </option>

                        </select>
                    </div>
                    
                    <button type="submit" name="boton" id="boton">Buscar</button>
                </form>
            </div>
            <div class="lista">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>May. Edad</th>
                            <th>Sexo</th>
                            <th>Rango Altura</th>
                        </tr>
                    </thead>
                    <tbody> <!-- iterar sobre la colección de objetos mostrando las descripciones-->
                        
                         <?php 
                            $total=0;
                            foreach ($obj_helpers::obtenerListaPersonasFiltrada($_GET) as $value3):  
                                $total= $total+1; 
                                echo "<tr>
                                           <td>{$value3 ->getNombre() }</td>
                                           <td>{$value3 ->esMayorEdad($value3 ->getEdad()) }</td>
                                           <td></td>
                                           <td>{$value3 ->getValorRangoAltura($value3 ->getAltura() ) }</td>
                                       </tr>";
                                                
                            endforeach; 
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <!-- ESCRIBIR EL TOTAL DE ELEMENTOS MOSTRADOS-->
                                <?php echo "<p>El total de elemento mostrados es : $total</p>"; ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </section>
    </body>
</html>
