<?php 

include_once 'dbh.inc.php';

$id = $_POST['id'];

$sql = "DELETE FROM posts WHERE id=$id;";
mysqli_query($conn, $sql);

header("Location: ../index.php");