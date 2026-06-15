<?php

    date_default_timezone_set('America/Sao_Paulo');

    $host    = "localhost";
    $dbname  = "aulaphp";
    $usuario = "root";
    $senha   = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
        //Testar se a conexão foi bem-sucedida
        
        //Se der err no sql, lança uma exceção.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
?>



