<?php

class Medico extends Conectar{
        
        public function insertar_medico($cedula,$nombre,$apellidos,$edad,$sede,$usuario,$password,$especialidad){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "INSERT INTO medico(cedula,nombre,apellidos,edad,sede,usuario,password,especialidad) VALUES (?,?,?,?,?,?,?,?)";
            $sql = $conectar->prepare($sql);


            $sql->bindValue(1,$cedula);
            $sql->bindValue(2,$nombre);
            $sql->bindValue(3,$apellidos);
            $sql->bindValue(4,$edad);
            $sql->bindValue(5,$sede);
            $sql->bindValue(6,$usuario);
            $sql->bindValue(7,md5($password));
            $sql->bindValue(8,$especialidad);

            $sql->execute();    

            return $resultado = $sql->fetchAll();
        }


        public function buscarRepetido($usuario){
            $conectar = parent::Conexion();
            parent::set_names();

            $sql = "SELECT * FROM medico WHERE usuario=?";
            
            $sql =$conectar->prepare($sql);

            $sql->bindValue(1,$usuario);

            $sql->execute();

            $resultado = $sql->fetchAll();

            if(count($resultado) > 0){
                return true;
            }
            return false;
        }

        public function login(){
            $conectar = parent::Conexion();
            parent::set_names();

            if(isset($_POST['enviar'])){
               $usuario = $_POST['usuario']; 
               $password = $_POST['password'];
               if(empty($usuario) and empty($password)){
                   header("Location:".Conectar::ruta()."index.php?m=2");
                   exit();
               }
               else{
                   $sql = "SELECT * FROM medico WHERE usuario=? and password=?";
                   $stmt = $conectar->prepare($sql);
                   $stmt->bindValue(1,$usuario);
                   $stmt->bindValue(2,md5($password));
                   $stmt->execute();
                   $resultado = $stmt->fetch();

                   if(is_array($resultado) and count($resultado)>0){
                        $_SESSION['cedula'] = $resultado['cedula'];
                        $_SESSION['usuario'] = $resultado['usuario'];
                        $_SESSION['password'] = $resultado['password'];
                        $_SESSION['start'] = time();
                        $_SESSION['expire'] = $_SESSION['start'] + (15 *60);

                        header("Location:".Conectar::ruta()."view/Home/homeMedico.php");
                        exit();
                   }else{
                        header("Location:".Conectar::ruta()."index.php?m=1");
                        exit();
                   }
               }
            }
        }

        public function buscarMedico($nombre){
            $conectar = parent::Conexion();
            parent::set_names();

            $sql="SELECT * FROM medico WHERE nombre LIKE '%$nombre%'";

            $stmt = $conectar->prepare($sql);

            $stmt->execute();
            $resultado = $stmt->fetch();
            
            

        }

        public function actualizarMedico($cedula,$nombre,$apellidos,$edad,$sede,$usuario,$password,$especialidad){
            $conectar = parent::Conexion();
            parent::set_names();

            $sql = "UPDATE medico SET cedula=?,nombre=?,apellidos=?,edad=?,sede=?,usuario=?,password=?,especialidad=? WHERE cedula=?";

            $sql = $conectar->prepare($sql);


            $sql->bindValue(1,$cedula);
            $sql->bindValue(2,$nombre);
            $sql->bindValue(3,$apellidos);
            $sql->bindValue(4,$edad);
            $sql->bindValue(5,$sede);
            $sql->bindValue(6,$usuario);
            $sql->bindValue(7,md5($password));
            $sql->bindValue(8,$especialidad);
            $sql->bindValue(9,$cedula);

            $sql->execute();    

            return $resultado = $sql->fetchAll();
        }

        public function borrar_medico($cedula){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "DELETE FROM medico WHERE cedula=?";
            $sql = $conectar->prepare($sql);

            $sql->bindValue(1,$cedula);

            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        public function buscarRepetidoCedula($cedula){
            $conectar = parent::Conexion();
            parent::set_names();

            $sql = "SELECT * FROM medico WHERE cedula=?";
            
            $sql =$conectar->prepare($sql);

            $sql->bindValue(1,$cedula);

            $sql->execute();

            $resultado = $sql->fetchAll();

            if(count($resultado) > 0){
                return true;
            }
            return false;
        }

    }
?>