<?php 
require_once 'conexion.php';

class Autos{
    public $Id;
    public $Marca;
    public $Modelo;
    Public $Version;

    public function BuscarTodas(){
        $Sql = 'SELECT Id, Marca, Modelo, Version FROM autos';
        $Sentencia = Conexion::Conectar()->query($Sql);

        return $Sentencia->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function Agregar(){
        $Sql = 'INSERT INTO personas (Marca, Modelo, Version) VALUES (:Marca, :Modelo, :Version)';
        $Conexion = Conexion::Conectar();
        $Sentencia = $Conexion->prepare($Sql);

        return $Sentencia->execute([
            ':Marca' => $this->Marca,
            ':Modelo' => $this->Modelo,
            ':Version' => $this->Version,
        ]);
    }

    public function Modificar(){
       if ($this->Id === null) {
            return false;
        }

        $Sql = 'UPDATE autos SET Marca = :Marca, Modelo = :Modelo, Version = :Version WHERE Id = :Id';
        $Sentencia = Conexion::Conectar()->prepare($Sql);

        return $Sentencia->execute([
            ':Marca' => $this->Marca,
            ':Modelo' => $this->Modelo,
            ':Version' => $this->Version,
            ':Id' => $this->Id,
        ]);  
    }

    public function BuscarPorId($id){
        
        $Sql = 'SELECT Id, Marca, Modelo, Version FROM autos WHERE Id = :Id';
        $Sentencia = Conexion::Conectar()->prepare($Sql);
        $Sentencia->execute([':Id' => $id]);

        $Sentencia->setFetchMode(PDO::FETCH_CLASS, 'Autos');

        return $Sentencia->fetch();
    }
}