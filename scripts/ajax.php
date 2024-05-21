<?php

require_once ('../Repos/LocalizacaoRepository.php');
require_once ('../Repos/NacionalidadeRepository.php');
$localizacaoRepository = new LocalizacaoRepository();
header('Content-Type: application/json');
if (isset($_GET['provincias'])) {
    try {

        $response = $localizacaoRepository->selectAllProvincias();
        foreach ($response as $provincia) {
            $provincias[] = array(
                'idtprovincia' => $provincia->getId(),
                'nome' => $provincia->getProvincia()
            );
        }
        echo json_encode($provincias);



    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
}
if (isset($_GET["nacionalidades"])) {
    try {
        $nacionalidadeRepository = new NacionalidadeRepository();
        $response = $nacionalidadeRepository->getAllNacionalidades();
        foreach ($response as $nacionalidade) { 
            $nacionalidades[] = array(
                'idtnacionalidade' => $nacionalidade->getId(),
                'nome' => $nacionalidade->getNacionalidade()
            );
        }
        echo json_encode($nacionalidades);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }

}

if (isset($_GET["municipios"])) {
    try {
        $provID = $_GET["municipios"];
        $response = $localizacaoRepository->selectMunicipiosFromProvincia($provID);
        foreach ($response as $municipio) {
            $municipios[] = array(
                'idtmunicipio' => $municipio->getId(),
                'nome' => $municipio->getMunicipio(),
            );
        }
        /* Testing only*/
        echo json_encode($municipios);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

if (isset($_GET["munID"])) {
    try {
        $munID = $_GET["munID"];
        $response = $localizacaoRepository->selectComunasFromMunicipios($munID);
        foreach ($response as $comuna) {
            $comunas[] = array(
                "idtcomunas" => $comuna->getId(),
                "nome" => $comuna->getComuna()
            );
        }
        echo json_encode($comunas);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


?>