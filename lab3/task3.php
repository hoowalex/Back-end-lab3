<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?
$comments = [];
$filename = "data.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['comment'])) {
        $comment = $_POST['name'] . ' write: ' . $_POST['comment'] . "<br>" ."\n" ; 
        file_put_contents($filename, $comment, FILE_APPEND | LOCK_EX);
    }
}
?>



<form method="post" action="task3.php">
    <table>
        <tr>
            <td>I'мя:</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Коментар:</td>
            <td><textarea name="comment" rows="5" cols="20"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" value="Відправити коментар"></td>
        </tr>
    </table>
</form>

<?
$comments = file_get_contents( $filename);

echo $comments;

?>


</body>
</html>