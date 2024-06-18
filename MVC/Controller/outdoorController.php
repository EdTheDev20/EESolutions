<?php
require ("Repos\OutdoorRepository.php");
class outdoorController {

    private $outdoorRepository = NULL;

    public function __construct(){
        $this->outdoorRepository = new OutdoorRepository();
    }

    public function createOutdoorC(){

        try{
        $tipoDeOutdoor = isset($_POST['tipoDeOutdoor']) ? filter_input(INPUT_POST, 'tipoDeOutdoor') : NULL;
        $provinciaSelect = isset($_POST['provinciaSelect']) ? filter_input(INPUT_POST, 'provinciaSelect') : NULL;
        $municipioSelect = isset($_POST['municipioSelect']) ? filter_input(INPUT_POST, 'municipioSelect') : NULL;
        $comunaSelect = isset($_POST['comunaSelect']) ? filter_input(INPUT_POST, 'comunaSelect') : NULL;
        $dataInicio = isset($_POST['dataInicio']) ? filter_input(INPUT_POST, 'dataInicio') : NULL;
        $dataFim = isset($_POST['dataFim']) ? filter_input(INPUT_POST, 'dataFim') : NULL;
       

        $image = $this->fileUpload();
        $preco = random_int(10000,1000000);
        $this->outdoorRepository->createOutdoor($dataInicio,$dataFim,
        $preco,"null",$image,$tipoDeOutdoor,$provinciaSelect,$municipioSelect,
        $comunaSelect,"3",$_SESSION['id']);
    } catch(PDOException $e){
        $e->getMessage();
    }
    
    }

    public function getUserOutdoors($uid){
        try{
            $outdoors = $this->outdoorRepository->getUserOutdoors($uid);
                return $outdoors;
        } catch(PDOException $e){
            $e->getMessage();
        }

    }
    
    public function fileUpload()
    {
        $relative_target_dir = 'assets/images/';
        $target_dir = realpath(__DIR__ . '/../../assets/images') . '/';        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
                return $relative_target_dir . basename($_FILES["image"]["name"]);            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    }
}



/* 
                                                                    TO 
                                                                    BE  
                                                                CONTINUED


*/





?>
