<?php	
require_once 'Fraccion.php';

    // Obtener los valores enviados desde el formulario
    $num1 = $_POST['num1'];
    $den1 = $_POST['den1'];
    $num2 = $_POST['num2'];
    $den2 = $_POST['den2'];
    $operacion = $_POST['operacion'];
// Obtener los enteros opcionales para cada fracción
$entero1 = isset($_POST['entero1']) && is_numeric($_POST['entero1']) ? (int) $_POST['entero1'] : 0;
$entero2 = isset($_POST['entero2']) && is_numeric($_POST['entero2']) ? (int) $_POST['entero2'] : 0;


    // Crear las fracciones
    $fraccion1 = new Fraccion($num1, $den1);
    $fraccion2 = new Fraccion($num2, $den2);

    // Si los enteros opcionales están definidos, sumarlos a las fracciones respectivas
    if ($entero1 !== null) {
        $fraccion1 = $fraccion1->sumarEntero($entero1);
    }

    if ($entero2 !== null) {
        $fraccion2 = $fraccion2->sumarEntero($entero2);
    }

    // Realizar la operación seleccionada
    switch ($operacion) {
        case 'sumar':
            $resultado = $fraccion1->sumar($fraccion2);
            break;
        case 'restar':
            $resultado = $fraccion1->restar($fraccion2);
            break;
        case 'multiplicar':
            $resultado = $fraccion1->multiplicar($fraccion2);
            break;
        case 'dividir':
            $resultado = $fraccion1->dividir($fraccion2);
            break;
        default:
            throw new Exception("Operación no válida.");
    }

    // Mostrar el resultado
    echo "<h2>Resultado:</h2>";    
    echo "<p>Resultado: " . $resultado . "</p>";


?>
</body>
</html>
<?php
