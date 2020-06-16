<?php

include_once 'include/config.php';

$mensaje = !empty($_POST['mensaje']) ? $_POST['mensaje'] : exit;
$usuario = !empty($_POST['usuario']) ? $_POST['usuario'] : exit;
$color = !empty($_POST['color']) ? $_POST['color'] : '#000000';
$time = microtime(true);

$mysqli -> query("INSERT INTO chat (usuario,mensaje,color,time) VALUES ('$usuario', '$mensaje', '$color', $time)");