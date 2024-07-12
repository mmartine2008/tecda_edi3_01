<?php
    require_once('Model.php');

    class EstadoModel extends Model {


        function todos() {
            $sql = 'SELECT *
                        FROM estado';
            $stmt = $this->getDb()->query($sql);
            
            $tareas = $stmt->fetchAll(PDO::FETCH_OBJ);
        
            return $tareas;
        }
        
        function estado_recuperar($db, $id) {
            $sql = 'SELECT *
                        FROM estado
                        WHERE id = ?';
        
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);
            $tarea = $stmt->fetch(PDO::FETCH_OBJ);
            return $tarea;     
        }
        
        
        function estado_eliminar($db, $id) {
            $sql = 'DELETE FROM estado WHERE id = ?';
            $statement = $db->prepare($sql);
            $statement->execute([$id]);
        }   
        
        function estado_editar($db, $datos) {
        
            $id = $datos['id'];
            $descripcion = $datos['descripcion'];
            
            $sql = 'UPDATE estado 
                        SET descripcion = ?
                        WHERE id = ?';
        
            $statement = $db->prepare($sql);
            $statement->execute([$descripcion, $id]);
        }  
        
        function estado_insertar($db, $datos) {
        
            $descripcion = $datos['descripcion'];
        
            $sql = 'INSERT INTO estado (descripcion) VALUES (?)';
        
            $statement = $db->prepare($sql);
            $statement->execute([$descripcion]);
        }     
        
    }