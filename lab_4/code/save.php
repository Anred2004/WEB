<?php
require __DIR__ . '/vendor/autoload.php';

try {
    $client = new \Google_Client();
    $client->setApplicationName('The table');
    $client->setScopes(['https://www.googleapis.com/auth/spreadsheets']);
    $client->setAccessType('offline');
    $path = __DIR__ . '/credentials.json';
    $client->setAuthConfig($path);

    // Sheets Service
    $service = new Google\Service\Sheets($client);


    $spreadsheetId = '1BHvq06APO-4V2qsLh_M2ahDNLwDxh1JqkiEvCJsTFW8';


    $range = 'list1!A:D';


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"] ?? '';
        $categories = $_POST["categories"] ?? '';
        $title = $_POST["title"] ?? '';
        $description = $_POST['text'] ?? '';


        $values = [
            [$email, $categories, $title, $description]
        ];
    }


    $body = new Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);
    $params = [
        'valueInputOption' => 'RAW'
    ];


    $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

} catch (Exception $e) {
    echo $e->getMessage() . ' save.php' . $e->getLine() . ' ' . $e->getFile() . ' ' . $e->getCode();
}

header('Location: index.php');
exit();
?>
