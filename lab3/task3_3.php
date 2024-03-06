<?php
$filePath = "file1.txt";


$words = file_get_contents($filePath);
$wordsArray = explode(" ", $words);

sort($wordsArray);

file_put_contents('sortedFile1.txt', implode(" ", $wordsArray));

echo "Слова у файлі впорядковано за алфавітом.";
?>