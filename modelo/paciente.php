<?php
    class Paciente extends Conectar{

        public function login(){
            $conectar = parent::Conexion();
            parent::set_names();

            if(isset($_POST['enviar'])){
               $correo = $_POST['usuario'];
               $password = $_POST['password'];
               if(empty($correo) and empty($password)){
                   header("Location:".Conectar::ruta()."index.php?m=2");
                   exit();  
               }
               else{
                   $sql = "SELECT * FROM paciente WHERE correo=? and password=?";
                   $stmt = $conectar->prepare($sql);
                   $stmt->bindValue(1,$correo);
                   $stmt->bindValue(2,md5($password));
                   $stmt->execute();
                   $resultado = $stmt->fetch();

                   if(is_array($resultado) and count($resultado)>0){
                        $_SESSION['cedula'] = $resultado['cedula'];
                        $_SESSION['correo'] = $resultado['correo'];
                        $_SESSION['password'] = $resultado['password'];
                        $_SESSION['start'] = time();
                        $_SESSION['expire'] = $_SESSION['start'] + (15 * 60);
                        header("Location:".Conectar::ruta()."view/Home/homePaciente.php"); 
                        exit();
                   }else{
                        header("Location:".Conectar::ruta()."index.php?m=1");
                        exit();
                   }
               }
            }
        }

        public function insertar_paciente($cedula,$nombre,$edad,$riesgo,$genero,$telefono,$correo,$password,$vacuna,$dosis){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "INSERT INTO paciente(cedula,nombre,correo,genero,edad,telefono,marca_vacuna,no_dosis,riesgo,password) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $sql = $conectar->prepare($sql);


            $sql->bindValue(1,$cedula);
            $sql->bindValue(2,$nombre);
            $sql->bindValue(3,$correo);
            $sql->bindValue(4,$genero);
            $sql->bindValue(5,$edad);
            $sql->bindValue(6,$telefono);
            $sql->bindValue(7,$vacuna);
            $sql->bindValue(8,$dosis);
            $sql->bindValue(9,$riesgo);
            $sql->bindValue(10,md5($password));

            $sql->execute();    


            return $resultado = $sql->fetchAll();
        }


        public function buscarRepetido($usuario){
            $conectar = parent::Conexion();
            parent::set_names();

            $sql = "SELECT * FROM paciente WHERE correo=?";
            
            $sql =$conectar->prepare($sql);

            $sql->bindValue(1,$usuario);

            $sql->execute();

            $resultado = $sql->fetchAll();

            if(count($resultado) > 0){
                return true;
            }
            return false;
        }

        public function buscarRepetidoCedula($cedula){
            $conectar = parent::Conexion();
            parent::set_names();

            $sql = "SELECT * FROM paciente WHERE cedula=?";
            
            $sql =$conectar->prepare($sql);

            $sql->bindValue(1,$cedula);

            $sql->execute();

            $resultado = $sql->fetchAll();

            if(count($resultado) > 0){
                return true;
            }
            return false;
        }

        public function actualizarPaciente($cedula,$nombre,$edad,$riesgo,$genero,$telefono,$correo,$password,$vacuna,$dosis){
            $conectar = parent::Conexion();
            parent::set_names();

            $sql = "UPDATE paciente SET cedula=?,nombre=?,correo=?,genero=?,edad=?,telefono=?,marca_vacuna=?,no_dosis=?,riesgo=?,password=?  WHERE cedula=?";

            $sql = $conectar->prepare($sql);


            $sql->bindValue(1,$cedula);
            $sql->bindValue(2,$nombre);
            $sql->bindValue(3,$correo);
            $sql->bindValue(4,$genero);
            $sql->bindValue(5,$edad);
            $sql->bindValue(6,$telefono);
            $sql->bindValue(7,$vacuna);
            $sql->bindValue(8,$dosis);
            $sql->bindValue(9,$riesgo);
            $sql->bindValue(10,md5($password));

            $sql->bindValue(11,$cedula);

            $sql->execute();    

            return $resultado = $sql->fetchAll();
        }

        public function borrar_paciente($cedula){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "DELETE FROM paciente WHERE cedula=?";
            $sql = $conectar->prepare($sql);

            $sql->bindValue(1,$cedula);

            $sql->execute();

            return $resultado = $sql->fetchAll();
        }
    }

?>