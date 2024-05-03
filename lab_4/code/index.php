<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lab_4</title>
</head>
<body>
<h1>The table</h1>

<form action="save.php" method="POST">
    <label for="email">Почта</label>
    <input type="email" name="email" required>

    <label for="title">Название</label>
    <input type="text" name="title" required>

    <label for="categories">Категория</label>
    <select name="categories" required>
        <option value="clothes">Одежда</option>
        <option value="groceries">Продукты</option>
        <option value="avto">Автомобили</option>
    </select><br>

    <label for="description">Описание:</label><br>
    <textarea name="text" rows="10" cols="54" required></textarea><br>

    <button type="submit">Отправить</button>
</form>
</form>
<div id="table">
    <table>
        <thead>
        <tr>
            <th>Почта</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Описание</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require __DIR__ . '/vendor/autoload.php';

        $client = new \Google_Client();
        $client->setApplicationName('The table');
        $client->setScopes(['https://www.googleapis.com/auth/spreadsheets']);
        $client->setAccessType('offline');
        $path = __DIR__ . '/credentials.json';
        $client->setAuthConfig($path);


        $service = new Google\Service\Sheets($client);


        $spreadsheetId = '1BHvq06APO-4V2qsLh_M2ahDNLwDxh1JqkiEvCJsTFW8';


        $range = 'list1!A:D';


        $service = new Google_Service_Sheets($client);
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();


        if (!empty($values)) {
            $isFirstRow = true; // Флаг для определения первой строки
            foreach ($values as $row) {
                if ($isFirstRow) {
                    $isFirstRow = false;
                    continue; // Пропускаем первую строку
                }
                echo '<tr>';
                foreach ($row as $cell) {
                    echo '<td>' . htmlspecialchars($cell) . '</td>';
                }
                echo '</tr>';
            }
        } else {
            echo 'Пусто.';
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
