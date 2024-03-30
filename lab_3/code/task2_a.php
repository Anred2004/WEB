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
    <header><h1> Task2_a </h1></header>
    <h3>Textarea:</h3>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $str = $_POST['text'];
        $strLen = strlen($str);
        $wordCount = count(explode(' ', $str));
        echo "Количество слов: $wordCount<br>";
        echo "Количество символов: $strLen<br>";
    }
    ?>
    <form action="" method="post">
        <textarea name="text" placeholder="Введите текст....."></textarea>
        <input type="submit">
    </form>
</body>
</html>
