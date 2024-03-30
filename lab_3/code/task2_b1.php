<?php
session_start();
if (!empty($_GET)) {
    $_SESSION['name'] = $_GET['name'];
    $_SESSION['surname'] = $_GET['surname'];
    $_SESSION['age'] = $_GET['age'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lab_3 task2</title>
</head>
<body>
    <header><h1> Task2_b1 </h1></header>
    <form action="" method="GET">
        <label for = "name">Ваше имя</label>
            <input name="name" required><br>
        <label for = "surname">Ваша фамилия</label>
            <input name="surname" required><br>
        <label for = "age">Ваш возраст</label>
            <input name="age" required><br>
        <input type="submit"><br>
    </form>
    <a href="task2_b2.php"><button>Перейти на другую страницу</button></a>
</body>
</html>
