<?php 

include_once 'dbh.inc.php';

$subject = $_POST['subject'];
$content = $_POST['content'];
$date = $_POST['date'];

$sql = "INSERT INTO posts (subject, content, date) VALUES ('$subject', '$content', '$date');";
mysqli_query($conn, $sql);

header("Location: ../index.php");