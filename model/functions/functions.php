<?php 
    function issAdmin(){
        $base_url = "http://localhost/catalogo/products.html";
        if(!isset($_SESSION['admin'])){ 
            header('location:'.$base_url);
    } else {
        return true;
        }
    }
?>