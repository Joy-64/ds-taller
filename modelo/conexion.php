<?php

class Conexion
{
    public static function Conectar()
    {
        $Config = require __DIR__ . '/../config/config.php';

        $Dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            $Config['Host'],
            $Config['Puerto'],
            $Config['Base'],
            $Config['Charset']
        );

        $Instancia = new PDO($Dsn, $Config['Usuario'], $Config['Clave']);
        $Instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $Instancia->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $Instancia;
    }
}
