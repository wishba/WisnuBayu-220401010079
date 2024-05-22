<?php 

include_once 'dbh.inc.php';

$id = $_POST['id'];
$subject = $_POST['subject'];
$content = $_POST['content'];

$sql = "UPDATE posts SET subject='$subject', content='$content' WHERE id=$id";
mysqli_query($conn, $sql);

header("Location: ../index.php");