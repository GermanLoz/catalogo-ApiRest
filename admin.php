
<?php  
    session_start(); 
    require_once 'model/functions/functions.php';
    issAdmin(); 
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <script src="https://kit.fontawesome.com/b90e9e4354.js" crossorigin="anonymous"></script>
    <link href="./assets/style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="./assets/responsive.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta
      name="description"
      content="Web site created using create-react-app"
    />
    <title>Ap KeepSmilling</title>
    </head>
    <header id="header">
    <!--    HEADER      -->
    <script src="components/header.js"></script>
    <!--   END  HEADER      -->
    </header>
<body>
   <div class="admin-cont">
    <button class="add-producto" >Agregar producto</button>
    <div class="mensaje" id="mensaje">
            <p class="mensaje-p"></p>
    </div> 
    <form  class="form-product" id="form" enctype="multipart/form-data">
       <input type="text" placeholder="Nombre" name="nombre" id="nombre"/>
        <textarea placeholder="Descripcion" name="descripcion" id="descripcion"></textarea>
        <input type="text" placeholder="Precio" name="precio" id="precio"/>
        <select type="categoria" name="categoria_id" id="categoria">
                        <option value="2" id="1">Iphone</option>
                        <option value="1" id="2">Samsung</option>
                        <option value="3" id="3">Motorola</option>
                        <option value="4" id="4">Xiaomi</option>
                    </option>
        </select>
        <input type="file" id="inpFile" name="inpFile" placeholder="IMAGEN"></input>
        <input type="submit" class="button-submit" value="AGREGAR"/>
     </form> 
   
   
   <div class="tabla">
        <div class="contenido-table" id="titles">
            <div class="item"><p>Marca</p></div>
            <div class="item"><p>Precio</p></div>
            <div class="item"><p>Imagen</p></div>
        </div>
   </div>
</div>
<!-- FORM EDIT -->
    <form class="form-product" id="formEdit" enctype="multipart/form-data">
        <button class="close-form">CLOSE</button>
       <input type="text" placeholder="Nombre" name="nombre" id="nombre"/>
        <textarea placeholder="Descripcion" name="descripcion" id="descripcion"></textarea>
        <input type="text" placeholder="Precio" name="precio" id="precio"/>
        <select type="categoria" name="categoria_id" id="categoria">
                        <option value="2" id="1">Iphone</option>
                        <option value="1" id="2">Samsung</option>
                        <option value="3" id="3">Motorola</option>
                        <option value="4" id="4">Xiaomi</option>
                    </option>
        </select>
        <input type="file" id="inpFile" name="inpFile" placeholder="IMAGEN"></input>
        <input type="submit" class="button-submit" value="AGREGAR"/>
     </form>  
<!--    END FROM EDIT   -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js" integrity="sha512-lTLt+W7MrmDfKam+r3D2LURu0F47a3QaW5nF0c6Hl0JDZ57ruei+ovbg7BrZ+0bjVJ5YgzsAWE+RreERbpPE1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- CONTROLLER SCRIPTS  -->
    <script src ="./controllers/alertas.js"></script>
    <script src ="./controllers/admin/functions.js"></script>
    <script src ="./controllers/nav.js"></script>
    <script src ="./controllers/admin/peticiones.js"></script>
    <script src ="./controllers/admin/tabla.js"></script>
    <script src ="./controllers/admin/forms.js"></script>

</body>
</html>