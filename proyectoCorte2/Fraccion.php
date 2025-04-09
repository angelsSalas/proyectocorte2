<?php 
// Clase Fraccion que representa una fracción matemática
class Fraccion {
    private $numerador;  // Atributo privado para almacenar el numerador de la fracción
    private $denominador;  // Atributo privado para almacenar el denominador de la fracción

    // Constructor de la clase, recibe el numerador y denominador, y los establece
    public function __construct($numerador, $denominador) {
        $this->setNumerador($numerador);  // Llama al setter de numerador
        $this->setDenominador($denominador);  // Llama al setter de denominador
    }

    // Método para obtener el valor del numerador
    public function getNumerador() {
        return $this->numerador;
    }

    // Método para obtener el valor del denominador
    public function getDenominador() {
        return $this->denominador;
    }

    // Setter para establecer el valor del numerador
    public function setNumerador($numerador) {
        $this->numerador = $numerador;
    }

    // Setter para establecer el valor del denominador
    // Verifica que el denominador no sea cero
    public function setDenominador($denominador) {
        if ($denominador == 0) {
            throw new Exception("El denominador no puede ser cero.");  // Lanza un error si el denominador es cero
            
        }
        $this->denominador = $denominador;  // Establece el valor del denominador
    }

    // Método para convertir la fracción a formato string (numerador/denominador)
    public function toString() {
        return $this->numerador . '/' . $this->denominador;
    }

    // Método para simplificar la fracción utilizando el máximo común divisor (MCD)
    public function simplificar() {
        $mcd = $this->mcd(abs($this->numerador), abs($this->denominador));  // Obtiene el MCD de numerador y denominador
        $this->numerador /= $mcd;  // Divide el numerador por el MCD
        $this->denominador /= $mcd;  // Divide el denominador por el MCD
    }

    // Método privado para calcular el máximo común divisor (MCD) utilizando el algoritmo de Euclides
    private function mcd($a, $b) {
        return $b == 0 ? $a : $this->mcd($b, $a % $b);  // Recursión para calcular el MCD
    }

    // Método para sumar dos fracciones
    public function sumar(Fraccion $segundaFraccion) {
        $num = $this->numerador * $segundaFraccion->getDenominador() + $segundaFraccion->getNumerador() * $this->denominador;  // Numerador de la suma
        $den = $this->denominador * $segundaFraccion->getDenominador();  // Denominador común
        $resultado = new Fraccion($num, $den);  // Crea una nueva fracción con el resultado
        $resultado->simplificar();  // Simplifica el resultado
        return $resultado;  // Devuelve el resultado simplificado
    }

    // Método para restar dos fracciones
    public function restar(Fraccion $segundaFraccion) {
        $num = $this->numerador * $segundaFraccion->getDenominador() - $segundaFraccion->getNumerador() * $this->denominador;  // Numerador de la resta
        $den = $this->denominador * $segundaFraccion->getDenominador();  // Denominador común
        $resultado = new Fraccion($num, $den);  // Crea una nueva fracción con el resultado
        $resultado->simplificar();  // Simplifica el resultado
        return $resultado;  // Devuelve el resultado simplificado
    }

    // Método para multiplicar dos fracciones
    public function multiplicar(Fraccion $segundaFraccion) {
        $num = $this->numerador * $segundaFraccion->getNumerador();  // Numerador de la multiplicación
        $den = $this->denominador * $segundaFraccion->getDenominador();  // Denominador de la multiplicación
        $resultado = new Fraccion($num, $den);  // Crea una nueva fracción con el resultado
        $resultado->simplificar();  // Simplifica el resultado
        return $resultado;  // Devuelve el resultado simplificado
    }

    // Método para dividir dos fracciones
    public function dividir(Fraccion $segundaFraccion) {
        if ($segundaFraccion->getNumerador() == 0) {
            throw new Exception("No se puede dividir por una fracción con numerador cero.");  // Lanza un error si el numerador de la segunda fracción es cero
        }
        $num = $this->numerador * $segundaFraccion->getDenominador();  // Numerador de la división
        $den = $this->denominador * $segundaFraccion->getNumerador();  // Denominador de la división
        $resultado = new Fraccion($num, $den);  // Crea una nueva fracción con el resultado
        $resultado->simplificar();  // Simplifica el resultado
        return $resultado;  // Devuelve el resultado simplificado
    }

    // Método para sumar un número entero como si fuera una fracción
    public function sumarEntero($entero) {
        // Convierte el número entero a una fracción con denominador 1
        $fraccionEntero = new Fraccion($entero, 1);
        return $this->sumar($fraccionEntero);  // Suma la fracción resultante con la fracción actual
    }
}
?>
