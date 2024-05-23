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
  <script src="script.js" defer></script>
</head>
<body>

<h1>Personal Journal App</h1>

<form action="includes/create.php" method="POST">
  <textarea  name="subject" placeholder="title"></textarea>
  <br>
  <textarea name="content" placeholder="content" rows="10"></textarea>
  <br>
  <button type="submit" name="submit">Save Journal</button>
</form>
<hr>

<?php 
  $sql = "SELECT * FROM posts ORDER BY id DESC;";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div>";

      echo "<div id='read-" . $row['id'] . "'>";
      echo "<h2>" . $row['subject'] . "</h2>";
      echo "<p>" . $row['content'] . "</p>";
      echo "<button onclick='showUpdate(" . $row['id'] . ")'>update</button>";
      echo "<form action='includes/delete.php' method='POST'>";
      echo "<input class='hide' type='text' name='id' value='" . htmlspecialchars($row['id']) . "'>";
      echo "<button type='submit' name='submit'>Delete</button>";
      echo "</form>";
      echo "</div>";

      echo "<div class='hide' id='update-" . $row['id'] . "'>";
      echo "<form action='includes/update.php' method='POST'>";
      echo "<input class='hide' type='text' name='id' value='" . htmlspecialchars($row['id']) . "'>";
      echo "<textarea  name='subject' placeholder='title'>" . htmlspecialchars($row['subject']) . "</textarea>";
      echo "<br>";
      echo "<textarea name='content' placeholder='content' rows='10'>" . htmlspecialchars($row['content']) . "</textarea>";
      echo "<br>";
      echo "<button type='submit' name='submit'>Update</button>";
      echo "</form>";
      echo "<button onclick='hideUpdate(" . $row['id'] . ")'>cancel</button>";
      echo "</div>";

      echo "<hr>";
      echo "</div>";
    }
  }
?>

</body>
</html>