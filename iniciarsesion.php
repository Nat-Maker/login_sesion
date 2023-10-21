<?php
/* Inicializa las variables de sesión */
session_start();
include('conexion.php');

if (isset($_POST['Usuario']) && isset($_POST['Clave'])) {
    /* Procesa los datos del formulario y realiza la validación */
    function validar($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Usuario = validar($_POST['Usuario']);
    $Clave = validar($_POST['Clave']);
    
    if (empty($Usuario) || empty($Clave)) {
        /* Si falta Usuario o Clave, redirige a la página de inicio con un mensaje de error */
        header("Location: index.php?error=Usuario y Clave requeridos");
        exit();
    }
    
    /* Ahora puedes realizar la consulta SQL y el resto del proceso de inicio de sesión */
    $sql = "SELECT * FROM alumnos WHERE Usuario = '$Usuario' AND Clave = '$Clave'";
    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['Usuario'] === $Usuario && $row['Clave'] === $Clave) {
            /* Establece las variables de sesión y redirige a la página de inicio */
            $_SESSION['Usuario'] = $row['Usuario'];
            $_SESSION['Nombre completo'] = $row['Nombre_completo'];
            $_SESSION['id'] = $row['id'];
            header("Location: inicio.php");
            exit();
        } else {
            header("Location: index.php?error=El Usuario o la Clave no corresponden");
            exit();
        }
    } else {
        header("Location: index.php?error=El Usuario o la Clave están incorrectos");
        exit();
    }
} else {
    /* En este caso, Usuario y Clave no se enviaron desde el formulario */
    header("Location: index.php?error=Usuario y Clave requeridos");
    exit();
}

?>