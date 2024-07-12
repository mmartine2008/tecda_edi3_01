<?php
    require_once('Model.php');
    
    class TareaModel extends Model {

        function todas() {
            $sql = 'SELECT tarea.*, estado.descripcion as estado 
                        FROM tarea
                        INNER JOIN estado ON (tarea.estado_id = estado.id)
                        ORDER BY tarea.id
                        ';
            $stmt = $this->getDb()->query($sql);
            
            $tareas = $stmt->fetchAll(PDO::FETCH_OBJ);
        
            return $tareas;
        }
        
        function una($id) {
            $sql = 'SELECT *
                        FROM tarea
                        WHERE id = ?';
        
            $stmt = $this->getDb()->prepare($sql);
            $stmt->execute([$id]);
            $tarea = $stmt->fetch(PDO::FETCH_OBJ);
            return $tarea;     
        }

        function eliminar($id) {
            $sql = 'DELETE FROM tarea WHERE id = ?';
            $statement = $this->getDb()->prepare($sql);
            $statement->execute([$id]);
        } 
        
        function tarea_editar($datos) {
        
            $id = $datos['id'];
            $descripcion = $datos['descripcion'];
            $estado_id = $datos['estado_id'];
        
            $sql = 'UPDATE tarea 
                        SET descripcion = ?, estado_id = ?
                        WHERE id = ?';
        
            $statement = $this->getDb()->prepare($sql);
            $statement->execute([$descripcion, $estado_id, $id]);
        }  
        
        function tarea_insertar($datos) {
        
            $descripcion = $datos['descripcion'];
            $estado_id = $datos['estado_id'];
        
            $sql = 'INSERT INTO tarea (descripcion, estado_id) 
                    VALUES (?, ?)';
        
            $statement = $this->getDb()->prepare($sql);
            $statement->execute([$descripcion, $estado_id]);
        }     
        
               
    }