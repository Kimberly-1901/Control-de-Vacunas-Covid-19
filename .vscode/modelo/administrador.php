<?php
    class Administrador extends Conectar{

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
                   $sql = "SELECT * FROM administrador WHERE usuario=? and password=?";
                   $stmt = $conectar->prepare($sql);
                   $stmt->bindValue(1,$usuario);
                   $stmt->bindValue(2,$password);
                   $stmt->execute();
                   $resultado = $stmt->fetch();

                   if(is_array($resultado) and count($resultado)>0){
                        $_SESSION['id_administrador'] = $resultado['id_administrador'];
                        $_SESSION['usuario'] = $resultado['usuario'];
                        $_SESSION['password'] = $resultado['password'];
                        $_SESSION['start'] = time();
                        $_SESSION['expire'] = $_SESSION['start'] + (15 * 60);
                        
                        header("Location:".Conectar::ruta()."view/Home/homeAdmin.php"); 
                        exit();
                   }else{
                        header("Location:".Conectar::ruta()."index.php?m=1");
                        exit();
                   }
               }
            }
        }
    }

?>