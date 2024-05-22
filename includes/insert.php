<?php 

include_once 'dbh.inc.php';

$subject = $_POST['subject'];
$content = $_POST['content'];

$sql = "INSERT INTO posts (subject, content) VALUES ('$subject', '$content');";
mysqli_query($conn, $sql);

header("Location: ../index.php");