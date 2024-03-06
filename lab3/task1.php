<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    a {
  color: blue;
  text-decoration: none;
  cursor: pointer;
}

a:hover {
  text-decoration: underline;
}


.big { font-size: 24px; }
.medium { font-size: 18px; }
.small { font-size: 14px; }

</style>
<?

if(isset($_GET['font-size'])){
    $fontsize = $_GET['font-size'];
    setcookie('fontSize', $fontsize, time() + (86400 * 30), "/");
}
else{
    $fontsize = isset($_COOKIE['fontSize']) ? $_COOKIE['fontSize'] : 'medium';
}


function getFontClass($size) {
    switch($size) {
        case 'big':
            return 'big';
        case 'small':
            return 'small';
        case 'medium':
        default:
            return 'medium';
    }
}
?>

<body class="<?php echo getFontClass($fontsize); ?>">
    <p><a href="?font-size=big">Великий шрифт</a></p>
    <p><a href="?font-size=medium">Середній шрифт</a></p>
    <p><a href="?font-size=small">Маленький шрифт</a></p>

    <p>Текст для тесту.</p>           
</body>

</html>