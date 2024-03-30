<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lab_3</title>
</head>
<body>
<form action="save.php" method="post">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="category">Категория:</label><br>
    <select id="category" name="category">
        <option value="cars">cars</option>
        <option value="bikes">bikes</option>
    </select><br>
    <label for="title">Заголовок объявления</label>
    <input type="text" name="title" required><br>
    <label for="description">Текст объявления</label>
    <textarea name="description" id="" cols="40" rows="10" required></textarea><br>
    <input type="submit" value="Сохранить">
</form>
     <table>
          <thead>
               <th>Категория</th>
               <th>Заголовок</th>
               <th>Описание</th>
          </thead>
          <?php
          $categories = scandir("categories");
          foreach ($categories as $category) {
               if ($category != "." && $category != "..") {
                   $announcements = scandir("categories/$category");
                   foreach ($announcements as $announcement) {
                        if ($announcement != "." && $announcement != "..") {
                            $title = pathinfo($announcement, PATHINFO_FILENAME);
                            $description = file_get_contents("categories/$category/$announcement");
                            echo "<tr><td>$category</td><td>$title</td><td>$description</td></tr>";
                        }
                   }
               }
          }
          ?>
     </table>
</body>
</html>
