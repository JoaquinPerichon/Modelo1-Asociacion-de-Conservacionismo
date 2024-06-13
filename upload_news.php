<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in']!== true) {
    header('Location: login.php');
    exit;
}

// Conecta a la base de datos
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Obtiene los datos de la noticia del formulario
$title = $_POST['title'];
$content = $_POST['content'];

// Guarda la imagen en el servidor
$target_dir = "uploads/";
$target_file = $target_dir. basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check!== false) {
        echo "File is an image - ". $check["mime"]. ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars(basename($_FILES["image"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Inserta la noticia en la base de datos
$sql = "INSERT INTO news (title, content, image, date_published) VALUES ('$title', '$content', '$target_file', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: ". $sql. "<br>". $conn->error;
}

$conn->close();
?>
