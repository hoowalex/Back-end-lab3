<?php

function getPasswordByLogin($loginToFind, $fileWithPath) {
    $lines = file($fileWithPath, FILE_IGNORE_NEW_LINES);

    foreach ($lines as $line) {
        list($login, $password) = explode(' ', $line);

        if ($login === $loginToFind) {
            return $password;
        }
    }

    return null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $folderPath = "users/$login";
    $fileWithPath = "users/passwords.txt";

    $password = getPasswordByLogin($login, $fileWithPath);
    if (file_exists($folderPath) && $password === $password) {
      
        $success = deleteFolder($folderPath);

        if ($success) {
            echo "Папка для користувача $login успішно видалена.";
        } else {
            echo "Помилка під час видалення папки.";
        }
    } else {
        echo "Помилка: Папка для користувача $login не існує або невірний пароль.";
    }

}
function deleteFolder($folderPath) {
    if (is_dir($folderPath)) {
        $objects = scandir($folderPath);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($folderPath . "/" . $object)) {
                    deleteFolder($folderPath . "/" . $object);
                } else {
                    unlink($folderPath . "/" . $object);
                }
            }
        }
        reset($objects);
        rmdir($folderPath);
        return true;
    } else {
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Видалення папки</title>
</head>
<body>


    <form action="delete.php" method="post">
        <label for="login">Логін:</label>
        <input type="text" id="login" name="login" required>

        <br>
        <br>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>

        <br>
        <br>

        <button type="submit">Видалити папку</button>
    </form>

</body>
</html>