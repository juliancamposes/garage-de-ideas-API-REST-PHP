<?php

require_once('Database.class.php');

    class Client{
        public static function create($email, $name, $city, $telephone){
            $database = new Database();
            $connection = $database->getConnection();
            $stmt = $connection->prepare('INSERT INTO listado_clientes (email, name, city, telephone) VALUES(:email, :name, :city, :telephone)');
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':name',$name);
            $stmt->bindParam(':city',$city);
            $stmt->bindParam(':telephone',$telephone);
            
            if($stmt->execute()){
                header("HTTP/1.1 201 Usuario creado correctamente");
            } else {
                header("HTTP/1.1 404 Error al crear el usuario");
            }   
        }

        public static function get_client_by_id($id){
            $database = new Database();
            $connection = $database->getConnection();
            $stmt =$connection->prepare('SELECT * FROM listado_clientes WHERE id=:id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            if($result != false){
                echo json_encode($result);
                header("HTTP/1.1 201 OK");
            } else {
                header("HTTP/1.1 404 Error al buscar el usuario con esa id");
            }

        }

        public static function get_all_clients(){
            $database = new Database();
            $connection = $database->getConnection();
            $stmt = $connection->prepare('SELECT * FROM listado_clientes');
            if($stmt->execute()){
                $result = $stmt->fetchAll();
                echo json_encode($result);
                header("HTTP/1.1 201 OK");
            } else {
                header("HTTP/1.1 404 Error al buscar los usuarios");
            }
        }

        public static function delete_client_by_id($id){
            $database = new Database();
            $connection = $database->getConnection();
            $stmt = $connection->prepare('DELETE FROM listado_clientes WHERE id=:id');
            $stmt->bindParam(':id',$id);
            
            if($stmt->execute()){
                header("HTTP/1.1 201 Usuario borrrado correctamente");
            } else {
                header("HTTP/1.1 404 Error al borrar el usuario con esa id");
            }
        }

        public static function update_client_by_id($id, $email, $name, $city, $telephone){
            $database = new Database();
            $connection = $database->getConnection();
            $stmt = $connection->prepare('UPDATE listado_clientes SET $email=:email, $name=:name, $city=:city, telephone=:telephone WHERE id=:id');
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':name',$name);
            $stmt->bindParam(':id',$city);
            $stmt->bindParam(':id',$telephone);
            if($stmt->execute()){
                header("HTTP/1.1 201 Usuario actualizado correctamente");
            } else {
                header("HTTP/1.1 404 Error al actualizar el usuario");
            }

        }

    }


?>