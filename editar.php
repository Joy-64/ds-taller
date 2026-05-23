<?php

require_once __DIR__ . '/modelo/autos.php';

$Id = $_GET['id'];

if ($_POST) {
    $Autos = new Autos();
    $Autos->Id = $Id;
    $Autos->Nombre = $_POST['Marca'];
    $Autos->Apellido = $_POST['Modelo'];
    $Autos->Dni = $_POST['Version'];
    $Autos->Modificar();

    header('Location: index.php');
    exit;
}

$p=new Persona();
$AutosActual = $p->BuscarPorId($Id);

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar Autos</title>
</head>
<body>
<h1>Editar Auto</h1>

<form method="post">
    <input type="hidden" name="Id" value="<?php echo $AutosActual->Id; ?>">
    <label>Marca
        <input type="text" name="Marca" value="<?= $AutosActual->Marca ?>">
    </label>
    <label>Modelo
        <input type="text" name="Modelo" value="<?= $AutosActual->Modelo ?>">
    </label>
    <label>Version
        <input type="text" name="Version" value="<?= $AutosActual->Version ?>">
    </label>
    <button type="submit">Actualizar</button>
</form>

<p><a href="index.php">Volver al listado</a></p>
</body>
</html>
