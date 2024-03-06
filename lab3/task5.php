<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $folderPath = "users/$login";
    $fileWithPass = "users/passwords.txt";
    if (!file_exists($folderPath)) {
        mkdir($folderPath);

        mkdir("$folderPath/video");
        mkdir("$folderPath/music");
        mkdir("$folderPath/photo");

        file_put_contents("$folderPath/video/video1.mp4", "Content of video1");
        file_put_contents("$folderPath/music/music1.mp3", "Content of music1");
        file_put_contents("$folderPath/photo/photo1.jpg", "Content of photo1");

        $userWithPass = $login . ' ' . $password;
        file_put_contents($fileWithPass, $userWithPass . PHP_EOL, FILE_APPEND);
        echo "Папка успішно створена для користувача $login.";
    } else {
        echo "Помилка: Папка для користувача $login вже існує.";
    }
}
?>

<body>
    <form action="task5.php" method="post">
        <label for="login">Логін:</label>
        <input type="text" id="login" name="login" required>

        <br>
        <br>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>

        <br>
        <br>

        <button type="submit">Створити папку</button>
    </form>
</body>

</html>