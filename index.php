<?php 
  include_once "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
  />
  <script src="script.js" defer></script>
</head>
<body>

  <main class="container">

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
          $id = htmlspecialchars($row["id"]);
          $subject = htmlspecialchars($row["subject"]);
          $content = htmlspecialchars($row["content"]);

          echo <<<HTML
            <div>

              <div id="read-$id">
                <h2>$subject</h2>
                <p>$content</p>
                <button class="update-button" onclick="showUpdate($id)">update</button>

                <form action="includes/delete.php" method="POST">
                  <input class="hide" type="text" name="id" value="$id">
                  <button type="submit" name="submit">Delete</button>
                </form>
              </div>

              <div class="hide" id="update-$id">
                <form action="includes/update.php" method="POST">
                  <input class="hide" type="text" name="id" value="$id">
                  <textarea  name="subject" placeholder="title">$subject</textarea>
                  <br>
                  <textarea name="content" placeholder="content" rows="10">$content</textarea>
                  <br>
                  <button type="submit" name="submit">Update</button>
                </form>
                <button onclick="hideUpdate($id)">cancel</button>
              </div>

            <hr>
            </div>
          HTML;
        }
      }
    ?>

  </main>

  <footer class="container">
    <small>App by <a href="https://wishba.github.io/">Wisnu Bayu</a> &copy; 2024</small>
  </footer>

</body>
</html>