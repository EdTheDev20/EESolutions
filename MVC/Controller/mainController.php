<?php
define('MVC_BASE_PATH', dirname(__FILE__) . '/../');
require_once ('userController.php');
require_once ('outdoorController.php');
class mainController
{
    public function handler()
    {
        $outdoorController = new outdoorController();
        $userController = new UserController();
        $op = "";
        if (isset($_SERVER['PATH_INFO'])) {
            $op = $_SERVER['PATH_INFO'];
        }
        /* header included in our controller for login manipulation */
        try {
            session_start();

            switch ($op) {
                case '/':
                    include_once (MVC_BASE_PATH . '/../' . "header.php");
                    include MVC_BASE_PATH . '/Views/expo.php';
                    include_once (MVC_BASE_PATH . '/../' . "footer.php");
                    break;

                case '/outdoors':
                    if (isset($_SESSION)) {
                        if(isset($_POST['outdoor_register'])){
                            $outdoorController->createOutdoorC();
                        //    header("Location: /eesolutions");
                        }
                        include_once (MVC_BASE_PATH . '/../' . "header.php");
                        include MVC_BASE_PATH . '/Views/outdoorRegister.php';
                        include_once (MVC_BASE_PATH . '/../' . "footer.php");
                    } else {
                        header("Location: /eesolutions");
                    }

                    break;
                case '/login':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                        if (isset($_POST['email']) && isset($_POST['password'])) {
                            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
                            $res = $userController->login($email, $password);
                            if ($res == 'Redirecionar') {
                                header("Location: /eesolutions");
                                exit();
                            } else {
                                /* makes a GET request to get back to the original page, 
                                if we use $op='/login' it will make an infinite loop*/
                                header("Location: /eesolutions/login?loginFailure=true");
                                exit();
                            }

                        }
                    } else {
                        include_once (MVC_BASE_PATH . '/../' . "header.php");
                        include MVC_BASE_PATH . '/Views/login.php';
                        include_once (MVC_BASE_PATH . '/../' . "footer.php");
                    }

                    break;
                case '/about':
                    include_once (MVC_BASE_PATH . '/../' . "header.php");
                    include MVC_BASE_PATH . '/Views/about.php';
                    include_once (MVC_BASE_PATH . '/../' . "footer.php");
                    break;
                case '/register':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form-submitted']) {
                        $userController->register("3", "3");
                        include_once (MVC_BASE_PATH . '/../' . "header.php");
                        include MVC_BASE_PATH . '/Views/registerSuccess.php';
                        include_once (MVC_BASE_PATH . '/../' . "footer.php");

                    } else {
                        include_once (MVC_BASE_PATH . '/../' . "header.php");
                        include MVC_BASE_PATH . '/Views/register.php';
                        include_once (MVC_BASE_PATH . '/../' . "footer.php");
                    }

                    break;

                case '/update':
                    if (isset($_SESSION)) {
                        if ($_SESSION['fk_tTipoDeUsuario'] == '3') {
                            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form-submitted'])) {
                                $userController->upUser("3", "1");
                                header("Location: /eesolutions/dashboard");
                                exit();
                            }
                        }
                    }
                    break;
                case '/logout':
                    session_destroy();
                    header('Location: /eesolutions');
                case '/dashboard':
                    if (isset($_SESSION)) {
                        if ($_SESSION['fk_tTipoDeUsuario'] == "1") {

                            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
                                $userController->deleteUser($_POST['delete']);
                            }

                            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['patch'])) {
                                $userController->approveUser($_POST['patch']);
                            }

                            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['block'])) {
                                $userController->blockUser($_POST['block']);
                            }

                            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form-submitted'])) {
                                $userController->register("2", "3");
                            }

                            $users = $userController->populateAdminDashboard();

                            include_once (MVC_BASE_PATH . '/../' . "header.php");
                            include MVC_BASE_PATH . '/Views/adminDashboard.php';
                            include_once (MVC_BASE_PATH . '/../' . "footer.php");
                        }
                        if ($_SESSION['fk_tTipoDeUsuario'] == '3') {
                            $User = $userController->getClientDash($_SESSION['id']);
                            $outdoors = $outdoorController->getUserOutdoors($_SESSION['id']);
                            include_once (MVC_BASE_PATH . '/../' . "header.php");
                            include MVC_BASE_PATH . '/Views/userDashboard.php';
                            include_once (MVC_BASE_PATH . '/../' . "footer.php");
                        }
                    }
                    break;
                default:
                    include_once (MVC_BASE_PATH . '/../' . "header.php");
                    include MVC_BASE_PATH . '/Views/error.php';
                    include_once (MVC_BASE_PATH . '/../' . "footer.php");
                    break;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }


    }
   
}

?>