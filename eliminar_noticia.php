<?php
include("config/config.php");

// Get the ID of the news to be deleted
$id = $_POST['id'];

// Delete the news from the database
$sql = "DELETE FROM noticias WHERE id = $id";
$result = $conexion->query($sql);

// Redirect to the admin page
header('Location: admin.php');
exit;
?>