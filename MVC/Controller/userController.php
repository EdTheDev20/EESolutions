<?php
require ("Repos\UsersRepository.php");
require ("MVC\Model\Mail.php");
class userController
{
    private $usersRepository = NULL;
    
    public function __construct(){
        $this->usersRepository = new UsersRepository();}

    public function upUser($fk_one,$fk_two){
        try{
            $nome = isset($_POST['nomeCompleto']) ? filter_input(INPUT_POST, 'nomeCompleto') : NULL;
            $email = isset($_POST['email']) ? filter_input(INPUT_POST, 'email') : NULL;
            $username = isset($_POST['username']) ? filter_input(INPUT_POST, 'username') : NULL;
            $numerotelefone = isset($_POST['numeroTel']) ? filter_input(INPUT_POST, 'numeroTel') : NULL;
            $password = isset($_POST['inputPassword']) ? filter_input(INPUT_POST, 'inputPassword') : NULL;
            $tipoDeCliente = isset($_POST['tipodeCliente']) ? filter_input(INPUT_POST, 'tipodeCliente') : NULL;
            $actividadeDaEmpresa = isset($_POST['actividadeDaEmpresa']) ? filter_input(INPUT_POST, 'actividadeDaEmpresa') : "null";
            $provincia = isset($_POST['provinciaSelect']) ? filter_input(INPUT_POST, 'provinciaSelect') : NULL;
            $municipio = isset($_POST['municipioSelect']) ? filter_input(INPUT_POST, 'municipioSelect') : NULL;
            $comuna = isset($_POST['comunaSelect']) ? filter_input(INPUT_POST, 'comunaSelect') : NULL;
            $morada = isset($_POST['morada']) ? filter_input(INPUT_POST, 'morada') : NULL;
            $nacionalidade = isset($_POST['nacionalidadeSelect']) ? filter_input(INPUT_POST, 'nacionalidadeSelect') : NULL;
            $res = $this->usersRepository->updateUser($_SESSION["id"], $nome, $email, $morada, $numerotelefone, $username, $password,
            $actividadeDaEmpresa, $provincia, $municipio, $comuna, $tipoDeCliente, $nacionalidade, $fk_one, $fk_two);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function register($fk_one,$fk_two)
    {
        try {
            $nome = isset($_POST['nomeCompleto']) ? filter_input(INPUT_POST, 'nomeCompleto') : NULL;
            $email = isset($_POST['email']) ? filter_input(INPUT_POST, 'email') : NULL;
            $username = isset($_POST['username']) ? filter_input(INPUT_POST, 'username') : NULL;
            $numerotelefone = isset($_POST['numeroTel']) ? filter_input(INPUT_POST, 'numeroTel') : NULL;
            $password = isset($_POST['inputPassword']) ? filter_input(INPUT_POST, 'inputPassword') : NULL;
            $tipoDeCliente = isset($_POST['tipodeCliente']) ? filter_input(INPUT_POST, 'tipodeCliente') : NULL;
            $actividadeDaEmpresa = isset($_POST['actividadeDaEmpresa']) ? filter_input(INPUT_POST, 'actividadeDaEmpresa') : "null";
            $provincia = isset($_POST['provinciaSelect']) ? filter_input(INPUT_POST, 'provinciaSelect') : NULL;
            $municipio = isset($_POST['municipioSelect']) ? filter_input(INPUT_POST, 'municipioSelect') : NULL;
            $comuna = isset($_POST['comunaSelect']) ? filter_input(INPUT_POST, 'comunaSelect') : NULL;
            $morada = isset($_POST['morada']) ? filter_input(INPUT_POST, 'morada') : NULL;
            $nacionalidade = isset($_POST['nacionalidadeSelect']) ? filter_input(INPUT_POST, 'nacionalidadeSelect') : NULL;
            $res = $this->usersRepository->createNewCliente(
                $nome,
                $email,
                $morada,
                $numerotelefone,
                $username,
                $password,
                $actividadeDaEmpresa,
                $provincia,
                $municipio,
                $comuna,
                $tipoDeCliente,
                $nacionalidade,
                $fk_one,
                $fk_two
            );

            $adminEmail = $this->usersRepository->getAdminEmail();
            $subject = "NOVO USUÁRIO CRIADO";
            $assunto = "Querido administrador, um novo usuário foi criado. Por favor acesso à aplicação para poder revisar.";
            $mail = new Mail("admin", $adminEmail, $subject, $assunto);
            $mail->sendMail();
        } catch (Exception $e) {
            echo $e->getMessage();

        }




    }

    public function login($email,$password){
        return $this->usersRepository->userLogin($email,$password);
    }

    public function populateAdminDashboard(){
        try{
            return $this->usersRepository->getUserforDashBoard();
        } catch(Exception $e){
            echo "Erro ao recolher usuários";
        }
    }

    public function approveUser($userId){
        try{
            return $this->usersRepository->ApproveUser($userId);
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function blockUser($userId){
        try{
            return $this->usersRepository->BlockUser($userId);
        } 
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteUser($userId){
        try{
            
            return $this->usersRepository->DeleteUser($userId);
        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function getClientDash($id){
        try {
            return $res = $this->usersRepository->getCliente($id);
        }
        catch(Exception $e){
            echo "Erro na pesquisa de clientes";
        }
    }

}


?>