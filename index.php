<?php 
    require_once 'modelo/autos.php';

    $p = new Autos();    
    $listAutos = $p->BuscarTodas();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Autos</title>
</head>
<body>
    <h1>Listado de autos</h1>
    <a href="agregar.php">Agregar nuevo auto</a>
    <br>
    <?php foreach ($listAutos as $p){ 
         echo 'Marca:' . $p->Marca . ' | Modelo: '.  $p->Modelo . ' | Version: ' . $p->Version; ?>
         <a href="editar.php?id=<?php echo $p->Id; ?>">Editar</a> <hr>
     <?php    
     } ?>

</body>
</html>