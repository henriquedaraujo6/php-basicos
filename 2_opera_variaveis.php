<?php

 // Montagem da URL 

 // http://localhost/php-basicos/php-basicos(alunos)/2_operavariáveis.php?numero1=10&numero2=5
 
 // Variáveis que recebem valores pela URL (Método GET)
$numero1 = $_GET['numero 1'];
$numero2 = $_GET['numero 2'];

 // Verifica-se os valores foram passados (isset)
 // e converte números inteiros
if (isset($numero1) && ($numero2) ) {

    $numero1 = (int) $numero1;
    $numero2 = (int) $numero2;
}

 // Cálculos
 $soma = $numero1 + $numero2;

 // Exibe 
 echo "Soma: $soma <br>";

?>