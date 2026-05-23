<?php 
if($_POST){
    require_once 'modelo/autos.php';

    $p = new Autos();
    $p->Marca = $_POST['Marca'];
    $p->Modelo = $_POST['Modelo'];
    $p->Version = $_POST['Version'];
    $p->Agregar();
    
    header('Location: index.php');
    exit;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregando autos</title>
</head>
<body>
    <h1>Agregando autos</h1>
    <form method="post">
        Marca
        <input type="text" name="Marca">
        Modelo
        <input type="text" name="modelo">
        Version
        <input type="text" name="version">
        <input type="submit" value="Agregar">
    </form>
</body>
</html>