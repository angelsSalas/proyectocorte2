<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Fracciones</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Calculadora de Fracciones</h1>
    <form action="procesar.php" method="post">
        <!-- Tabla para mostrar las fracciones paralelas -->
        <table style="width: 100%; text-align: center;">
            <tr>
                <td>
                    <!-- Primera Fracción -->
                    <h3>Primera Fracción</h3>
                    Numerador: <input type="number" name="num1" required><br>
                    Denominador: <input type="number" name="den1" required><br>
                    Entero opcional: <input type="number" name="entero1"><br>
                </td>
                <td>
                    <!-- Segunda Fracción -->
                    <h3>Segunda Fracción</h3>
                    Numerador: <input type="number" name="num2" required><br>
                    Denominador: <input type="number" name="den2" required><br>
                    Entero opcional: <input type="number" name="entero2"><br>
                </td>
            </tr>
        </table>
        <!-- Sección para seleccionar la operación -->
        <h3>Operación</h3>
        <select name="operacion" required>
            <option value="sumar">Sumar</option>
            <option value="restar">Restar</option>
            <option value="multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>
        </select><br><br>

        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Calcular">
    </form>
</body>
</html>

