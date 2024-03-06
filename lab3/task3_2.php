<?php
function findUniqueInFirstFile($file1, $file2)
{
    $content1 = file($file1, FILE_IGNORE_NEW_LINES);
    $content2 = file($file2, FILE_IGNORE_NEW_LINES);

    $uniqueInFirst = array_diff($content1, $content2);

    return $uniqueInFirst;
}

function findCommon($file1, $file2) {
    $content1 = file($file1, FILE_IGNORE_NEW_LINES);
    $content2 = file($file2, FILE_IGNORE_NEW_LINES);

    $common = array_intersect($content1, $content2);

    return $common;
}


function findRepeated($file1, $file2) {
    $content1 = file($file1, FILE_IGNORE_NEW_LINES);
    $content2 = file($file2, FILE_IGNORE_NEW_LINES);

    $allLines = array_merge($content1, $content2);

    $countedLines = array_count_values($allLines);

    $repeated = [];
    foreach ($countedLines as $line => $count) {
        if ($count > 2) {
            $repeated[] = $line;
        }
    }

    return $repeated;
}

function deleteFile($fileName) {
    if (file_exists($fileName)) {
        unlink($fileName);
        return true;
    } else {
        return false;
    }
}

$file1 = "file1.txt";
$file2 = "file2.txt";

$uniqueInFirst = findUniqueInFirstFile($file1, $file2);
$common = findCommon($file1, $file2);
$repeated = findRepeated($file1, $file2);

file_put_contents("uniqueInFirst.txt", implode("\n", $uniqueInFirst));
file_put_contents("common.txt", implode("\n", $common));
file_put_contents("repeated.txt", implode("\n", $repeated));

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fileToDelete'])) {
    $fileToDelete = $_POST['fileToDelete'];
    if (deleteFile($fileToDelete)) {
        echo "Файл \"$fileToDelete\" видалено.";
    } else {
        echo "Файл \"$fileToDelete\" не існує або не може бути видалений.";
    }
}   


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="">
        <label for="fileToDelete">Введіть ім'я файлу для видалення:</label>
        <input type="text" id="fileToDelete" name="fileToDelete" required>
        <button type="submit">Видалити файл</button>
    </form>
</body>

</html>