<?php   
	if (!isset($_SESSION)) {
		session_start();
	}

    include('CapaDatos/class_Usuario.php');

    if (isset($_POST['Usuario']) && isset($_POST['Clave']) ) {

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $Usuario = validate($_POST['Usuario']); 
        $Clave = validate($_POST['Clave']);

        if (empty($Usuario)) {
            header("Location: index.php?error=El Usuario Es Requerido");
            exit();
        }elseif (empty($Clave)) {
            header("Location: index.php?error=La clave Es Requerida");
            exit();
        }else{
            $User = new class_Usuario();
            $reg = $User->ObtenerUsuario($Usuario, $Clave);

            if (!empty($reg)) {
                    $_SESSION['Usuario'] = $reg[0]['username'];
                    $_SESSION['Nombre_Completo'] = $reg[0]['nombre_completo'];
                    $_SESSION['sexo'] = $reg[0]['sexo'];
                    header("Location: CapaPresentacion/home/home.php");
                    exit();
            }else {
                    header("Location: Index.php?error=El usuario o la clave son incorrectas");
                    exit();
            }
        }

    } else {
        header("Location: Index.php");
                exit();
    }

