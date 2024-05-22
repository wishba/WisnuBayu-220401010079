<?php 
  include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Personal Journal App</h1>

<form action="includes/insert.php" method="POST">
  <textarea  name="subject" placeholder="title"></textarea>
  <br>
  <textarea name="content" placeholder="content" rows="10"></textarea>
  <br>
  <button type="submit" name="submit">Save Journal</button>
</form>

<?php 
  $sql = "SELECT * FROM posts;";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div>";
      echo "<h2>" . $row['subject'] . "</h2>";
      echo "<p>" . $row['content'] . "</p>";
      echo "<hr>";
      echo "</div>";
    }
  }
?>

</body>
</html>