<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?
session_start();

if(isset($_POST['login'])){
    if($_POST['login'] === 'Admin' && $_POST['passwrd'] === 'password'){
        $_SESSION['loggined'] = true;
    }
    else{
        $error = "Невірний логін чи пароль";
    }
}
else{
    $_SESSION['loggined'] = false;
}
?>


<form method="post" action="task2.php">
    <table>
        <tr>
            <td>Login:</td>
            <td><input type="text" name="login"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="passwrd" ></td>
        </tr>
        <input type='submit' value='Увійти'>
    </table>
</form>

<?

if (isset($_SESSION['loggined']) && $_SESSION['loggined'] === true) {
    echo "Добрий день, Admin!";
}
if (isset($error)) {
    echo "<p style='color: red;'>$error</p>";
    $_SESSION['loggined'] = false;
}
?>

</body>
</html>
