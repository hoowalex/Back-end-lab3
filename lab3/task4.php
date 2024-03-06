<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?
    $uploadDirectory = "uploads/";

    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadedFile = $_FILES['image'];

            $uniqueFileName = uniqid('image_') . '.' . pathinfo($uploadedFile['name'], PATHINFO_EXTENSION);

            $destination = $uploadDirectory . $uniqueFileName;

            move_uploaded_file($uploadedFile['tmp_name'], $destination);

            echo "Файл успішно завантажено. Шлях: $destination";
        } else {
            echo "Помилка під час завантаження файлу.";
        }
    }
    ?>

    <form action="task4.php" method="post" enctype="multipart/form-data">
        <label for="image">Оберіть зображення для завантаження:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <br>
        <br>

        <button type="submit">Завантажити</button>
    </form>
</body>

</html>