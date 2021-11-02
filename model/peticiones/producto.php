<?php 
require_once '../clases/producto.php';
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
            $values = $_POST;
            if(isset($values)){
                $nombre = isset($values['nombre']) ? $values['nombre'] : false;
                $descripcion = isset($values['descripcion']) ? $values['descripcion'] : false;
                $precio = isset($values['precio']) ? intval($values['precio']) : false;
                $categoria = isset($values['categoria_id']) ? intval($values['categoria_id']) : false;
                
                if(isset($_FILES['inpFile'])){ 
                    $file = $_FILES['inpFile'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];
                }

                if($nombre && $descripcion && $precio && $categoria){
                    $producto = new Producto();
                    $producto->setNombre($nombre);
                    $producto->setDescripcion($descripcion);
                    $producto->setPrecio($precio);
                    $producto->setCategoria_id($categoria);

                 if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/git"){
                        if(!is_dir('uploads/images')){
                            mkdir('uploads/images', 0777, true);
                        }
                        $producto->setImagen($filename);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                    }

                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $producto->setId($id);
                        $save = $producto->edit();
                        echo json_encode($save);
                    } else { 
                        $save = $producto->save();
                        echo json_encode($save);
                    }

            }
        }
        break;
    case 'GET':
        $producto = new Producto();
        $productos = $producto->getRandom(10);
        echo json_encode($productos);
        break;

    case 'PUT':
        $_POST = json_decode(file_get_contents('php://input'), true);
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            if(isset($_FILES['imagen'])){ 
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];
            }
            if($nombre && $descripcion && $stock && $precio && $categoria && $oferta){
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setCategoria_id($categoria);

                if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/git"){
                    if(!is_dir('uploads/images')){
                        mkdir('uploads/images', 0777, true);
                    }
                    $producto->setImagen($filename);
                    move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                }
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->edit();
                }
            }
        }
        break;
    case 'DELETE':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $delete = $producto->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'error';
            }
        }
        break;
}
?>