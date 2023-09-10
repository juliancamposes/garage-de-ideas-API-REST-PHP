<?php
    require_once('../includes/Client.class.php');

    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            if(isset($_GET['email']) && isset($_GET['name']) && isset($_GET['city']) && isset($_GET['telephone'])){
                 Client::create($_GET['email'],$_GET['name'],$_GET['city'],$_GET['telephone']);
                 break;   
            } else {
                header("HTTP/1.1 400 El usuario no se ha podido insertar en la base de datos, informacion incorrecta");
                break;
            }
     
        case 'GET':
            if(isset($_GET['id'])){
                Client::get_client_by_id($_GET['id']);
                break;
            } else {
                Client::get_all_clients();
                header("HTTP/1.1 201 OK");
                break;
            }
        case 'DELETE':
            if(isset($_GET['id'])){
                Client::delete_client_by_id($_GET['id']);
                break;
            } else {
                header("HTTP/1.1 400 ERROR");
                break;
            }
        case 'PUT':
            if(isset($_GET['id'])){
                Client::delete_client_by_id($_GET['id'], $_GET['email'], $_GET['name'], $_GET['city'], $_GET['telephone']);
                break;
            } else {
                header("HTTP/1.1 400 ERROR");
                break;
            }
    }
?>