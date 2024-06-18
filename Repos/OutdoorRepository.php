<?php

require_once (MVC_BASE_PATH . './Model/Outdoor.php');
require_once (MVC_BASE_PATH . './Model/Database.php');
require_once (MVC_BASE_PATH . './Model/OutdoorType.php');
class OutdoorRepository
{
    private $database;
    function __construct()
    {
        $this->database = Database::getInstance();
    }


    /*----------------------------------------------------------Create Read Update Delete----------------------------------------------------*/

    public function createOutdoor(
        $dataIni,
        $dataFim,
        $preco,
        $comprovativo,
        $imagem,
        $fk_ttipodeoutdoor,
        $fk_tprovincia,
        $fk_tmunicipio,
        $fk_tcomuna,
        $fk_testadodeoutdoor,
        $fk_tuser
    ) {

        try {
            $stmt = $this->database->prepare("INSERT INTO toutdoor(data_ini,data_fim,
            preco,comprovativo,imagem,fk_ttipodeoutdoor,fk_tprovincia,fk_tmunicipio,
            fk_tcomuna,fk_testadodeoutdoor,fk_tuser)
            VALUES(:dataIni,:dataFim,:preco,:comprovativo,
            :imagem,:fk_ttipodeoutdoor,:fk_tprovincia,
            :fk_tmunicipio,:fk_tcomuna,:fk_testadodeoutdoor,:fk_tuser)");
            $stmt->bindParam(":dataIni", $dataIni);
            $stmt->bindParam(":dataFim", $dataFim);
            $stmt->bindParam(":preco", $preco);
            $stmt->bindParam(":comprovativo", $comprovativo);
            $stmt->bindParam(":imagem", $imagem);
            $stmt->bindParam(":fk_ttipodeoutdoor", $fk_ttipodeoutdoor);
            $stmt->bindParam(":fk_tprovincia", $fk_tprovincia);
            $stmt->bindParam(":fk_tmunicipio", $fk_tmunicipio);
            $stmt->bindParam(":fk_tcomuna", $fk_tcomuna);
            $stmt->bindParam(":fk_testadodeoutdoor", $fk_testadodeoutdoor);
            $stmt->bindParam(":fk_tuser", $fk_tuser);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateOutdoor(
        $outdoorId,
        $dataIni,
        $dataFim,
        $preco,
        $comprovativo,
        $imagem,
        $fk_ttipodeoutdoor,
        $fk_tprovincia,
        $fk_tmunicipio,
        $fk_tcomuna,
        $fk_testadodeoutdoor,
        $fk_tuser
    ) {
        try {
            $stmt = $this->database->prepare("UPDATE toutdoor 
            SET data_ini = :dataIni,
            data_fim = :dataFim,
            preco = :preco,
            comprovativo = :comprovativo,
            imagem = :imagem,
            fk_ttipodeoutdoor = :fk_ttipodeoutdoor,
            fk_tprovincia = :fk_tprovincia,
            fk_tmunicipio = :fk_tmunicipio,
            fk_tcomuna = :fk_tcomuna,
            fk_testadodeoutdoor = :fk_testadodeoutdoor,
            fk_tuser = :fk_tuser
            WHERE id = :id");
            $stmt->bindParam(":id", $outdoorId);
            $stmt->bindParam(":dataIni", $dataIni);
            $stmt->bindParam(":dataFim", $dataFim);
            $stmt->bindParam(":preco", $preco);
            $stmt->bindParam(":comprovativo", $comprovativo);
            $stmt->bindParam(":imagem", $imagem);
            $stmt->bindParam(":fk_ttipodeoutdoor", $fk_ttipodeoutdoor);
            $stmt->bindParam(":fk_tprovincia", $fk_tprovincia);
            $stmt->bindParam(":fk_tmunicipio", $fk_tmunicipio);
            $stmt->bindParam(":fk_tcomuna", $fk_tcomuna);
            $stmt->bindParam(":fk_testadodeoutdoor", $fk_testadodeoutdoor);
            $stmt->bindParam(":fk_tuser", $fk_tuser);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function deleteOutdoor($outdoorId)
    {
        try {
            $statement = $this->database->prepare("DELETE FROM toutdoor WHERE id =:id");
            $statement->bindParam(":id", $outdoorId);
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getOutdoor($outdoorId)
    {

        try {
            $statement = $this->database->prepare("SELECT toutdoor.id, toutdoor.data_ini,
            toutdoor.data_fim, 
            toutdoor.preco,
            toutdoor.comprovativo, toutdoor.imagem, toutdoor.fk_tuser,
            ttipodeoutdoor.name AS tipodeoutdoor_name,
            tprovincia.nome AS provincia_name,
            tmunicipio.nome AS municipio_name,
            tcomuna.nome AS comuna_name,
            testadodeoutdoor.name AS estadodeoutdoor_name
            FROM toutdoor
            LEFT JOIN tprovincia ON toutdoor.fk_tprovincia = tprovincia.idtprovincia
            LEFT JOIN tmunicipio ON toutdoor.fk_tmunicipio = tmunicipio.idtmunicipio
            LEFT JOIN tcomuna ON toutdoor.fk_tcomuna = tcomuna.idtcomuna
            LEFT JOIN testadodeoutdoor ON toutdoor.fk_testadodeoutdoor = testadodeoutdoor.id
            LEFT JOIN ttipodeoutdoor ON toutdoor.fk_ttipodeoutdoor = ttipodeoutdoor.id WHERE toutdoor.id = :id;");
            $statement->bindParam(":id", $outdoorId);
            $statement->execute();
            $result = $statement->fetchAll();
            foreach ($result as $out) {

                $outdoor = new Outdoor(
                        $out['id'],
                        $out['tipodeoutdoor_name'],
                        "null",
                        $out['provincia_name'],
                        $out['municipio_name'],
                        $out['comuna_name'],
                        $out['data_inicio'],
                        $out['data_fim'],
                        $out['imagem'],
                        $out['estadodeoutdoor_name'],
                        $out['preco'],
                        $out['comprovativo'],
                        $out['fk_tuser']
                );
            }
            return $outdoor;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getUserOutdoors($userId)
    {

        try {
            $statement = $this->database->prepare("SELECT toutdoor.id, toutdoor.data_ini,
            toutdoor.data_fim, 
            toutdoor.preco,
            toutdoor.comprovativo, toutdoor.imagem, toutdoor.fk_tuser,
            ttipodeoutdoor.name AS tipodeoutdoor_name,
            tprovincia.nome AS provincia_name,
            tmunicipio.nome AS municipio_name,
            tcomuna.nome AS comuna_name,
            testadodeoutdoor.name AS estadodeoutdoor_name
            FROM toutdoor
            LEFT JOIN tprovincia ON toutdoor.fk_tprovincia = tprovincia.idtprovincia
            LEFT JOIN tmunicipio ON toutdoor.fk_tmunicipio = tmunicipio.idtmunicipio
            LEFT JOIN tcomuna ON toutdoor.fk_tcomuna = tcomuna.idtcomuna
            LEFT JOIN testadodeoutdoor ON toutdoor.fk_testadodeoutdoor = testadodeoutdoor.id
            LEFT JOIN ttipodeoutdoor ON toutdoor.fk_ttipodeoutdoor = ttipodeoutdoor.id WHERE toutdoor.fk_tuser= :id;");
            $statement->bindParam(":id", $userId);
            $statement->execute();
            $result = $statement->fetchAll();
            foreach ($result as $out) {

                $outdoors[] = new Outdoor(
                    $out['id'],
                    $out['tipodeoutdoor_name'],
                    "null",
                    $out['provincia_name'],
                    $out['municipio_name'],
                    $out['comuna_name'],
                    $out['data_ini'],
                    $out['data_fim'],
                    $out['imagem'],
                    $out['estadodeoutdoor_name'],
                    $out['preco'],
                    $out['comprovativo'],
                    $out['fk_tuser']
                );
            }
            return $outdoors;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getTiposDeOutdoor()
    {
        try {
            $statement = $this->database->prepare("SELECT * from ttipodeoutdoor");
            $statement->execute();
            $result = $statement->fetchAll();
            foreach ($result as $type) {
                $outdoorTypes[] = new OutdoorType($type['id'], $type['name']);
            }
            return $outdoorTypes;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAllOutdoors()
    {

        try {
            $statement = $this->database->prepare("SELECT toutdoor.id,
            toutdoor.data_ini,
            toutdoor.data_fim, 
            toutdoor.preco,
            toutdoor.comprovativo, toutdoor.imagem,
            toutdoor.fk_tuser,
            ttipodeoutdoor.name AS tipodeoutdoor_name,
            tprovincia.nome AS provincia_name,
            tmunicipio.nome AS municipio_name,
            tcomuna.nome AS comuna_name,
            testadodeoutdoor.name AS estadodeoutdoor_name
            FROM toutdoor
            LEFT JOIN tprovincia ON toutdoor.fk_tprovincia = tprovincia.idtprovincia
            LEFT JOIN tmunicipio ON toutdoor.fk_tmunicipio = tmunicipio.idtmunicipio
            LEFT JOIN tcomuna ON toutdoor.fk_tcomuna = tcomuna.idtcomuna
            LEFT JOIN testadodeoutdoor ON toutdoor.fk_testadodeoutdoor = testadodeoutdoor.id
            LEFT JOIN ttipodeoutdoor ON toutdoor.fk_ttipodeoutdoor = ttipodeoutdoor.id;");
            $statement->execute();
            $result = $statement->fetchAll();
            foreach ($result as $out) {

                $outdoors[] = new Outdoor(
                    $out['id'],
                    $out['data_ini'],
                    $out['data_fim'],
                    $out['preco'],
                    $out['comprovativo'],
                    $out['imagem'],
                    $out['tipodeoutdoor_name'],
                    $out['provincia_name'],
                    $out['municipio_name'],
                    $out['comuna_name'],
                    $out['estadodeoutdoor_name'],
                    $out['fk_tuser']
                );
            }
            return $outdoors;



        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


} ?>