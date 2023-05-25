<?php
    session_start();
    include("grafos.php");
    $grafo = new Grafo();
    $grafo->agregarRelacion($_GET['id']);  
?>
