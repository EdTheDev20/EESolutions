<?php
require_once MVC_BASE_PATH . '/Model/Pessoa.php';
class Gestor extends Pessoa {
function __construct($userId='null',$clientType,$name,$email,$address,$cellphoneNumber,$username,$password,$provincia,$municipio,$comuna,$id='null'){
    parent::__construct($userId,$clientType,$name,$email,$address,$cellphoneNumber,$username,$password,$provincia,$municipio,$comuna,$id);
}

}

