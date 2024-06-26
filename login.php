<?php
session_start();

// Revisa las credenciales del administrador
$admin_username = 'admin';
$admin_password = '22acdyccc14'; // Cambia esta contraseña por la que desees

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['logged_in'] = true;
        header('Location: admin.php');
        exit;
    } else {
        echo "Invalid username or password.";
        exit;
    }
}
?>
