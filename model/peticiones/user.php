<?php 
session_start();
require_once '../clases/user.php';
require_once '../../config/db.php';

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        if(isset($_POST)){
            $email = isset($_POST['email']) ? $_POST['email'] : false ;
            $password = isset($_POST['password']) ? $_POST['password'] : false ;
                if($password && strlen($password) > 3  && $email && strpos($email, '.com') !== false && strpos($email, '@') !== false ){
                    $user = new Usuario ;
                    $user->setEmail($email);
                    $user->setPassword($password);
                    if($_GET['action'] === 'login'){
                        $query = $user->login();
                        if($query){
                            if($query->rol === 'admin'){ 
                                $_SESSION['admin'] = true;
                                echo json_encode($_SESSION['admin']);
                            }
                        } else {
                            echo json_encode(false);
                        }
                    } else {
                        $query = $user->saveDate();
                        echo json_encode($query);
                    }
                } else {
                    echo json_encode(false);
                 }
        } else {
            echo json_encode(false);
        }
    }
?>