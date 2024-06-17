<?php

require_once (MVC_BASE_PATH . './Model/Outdoor.php');
require_once (MVC_BASE_PATH . './Model/Database.php');

class OutdoorRepository
{
    private $database;
    function __construct()
    {
        $this->database = Database::getInstance();
    }



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
        $fk_testadodeoutdoor
    ) {

        try {
            $stmt = $this->database->prepare("INSERT INTO toudoor(data_ini,data_fim,preco,comprovativo,imagem,fk_ttipodeoutdoor,fk_tprovincia,fk_tmunicipio,fk_tcomuna,fk_testadodeoutdoor)
            VALUES(:dataIni,:dataFim,:preco,:comprovativo,
            :imagem,:fk_ttipodeoutdoor,:fk_tprovincia,
            :fk_tmunicipio,:fk_tcomuna,:fk_testadodeoutdoor)");
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
        $fk_testadodeoutdoor
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
            fk_testadodeoutdoor = :fk_testadodeoutdoor
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
            toutdoor.comprovativo, toutdoor.imagem,
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
            foreach($result as $out){
                
            $outdoor = new Outdoor($out['id'],$out['data_ini'],
            $out['data_fim'],$out['preco'],$out['comprovativo'],
            $out['imagem'],$out['tipodeoutdoor_name'],
            $out['provincia_name'],$out['municipio_name'],
            $out['comuna_name'],$out['estadodeoutdoor_name']);
            }
            return $outdoor;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAllOutdoors(){

        try{
            $statement = $this->database->prepare("SELECT toutdoor.id,
            toutdoor.data_ini,
            toutdoor.data_fim, 
            toutdoor.preco,
            toutdoor.comprovativo, toutdoor.imagem,
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
            foreach($result as $out){
                
            $outdoors[] = new Outdoor($out['id'],$out['data_ini'],
            $out['data_fim'],$out['preco'],$out['comprovativo'],
            $out['imagem'],$out['tipodeoutdoor_name'],
            $out['provincia_name'],$out['municipio_name'],
            $out['comuna_name'],$out['estadodeoutdoor_name']);
            }
            return $outdoors;
     
            

        } 
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }


} ?>