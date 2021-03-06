<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php

    require "app_config.php";
    require "database_connection.php";
    
    $query_text = $_REQUEST['query'];
    $result = mysqli_query($link, $query_text);
    
    if(!$result) {
        die("<p>Ошибка при выполнении SQL запроса ".$query_text. " : ". mysqli_error($link) ."</p>");
    }
    
    $return_rows = true; //был false
    // $strtoupper_query_text = strtoupper($query_text); // переводит текст в верхний регистр

    if ( preg_match("/^\s*(CREATE|INSERT|UPDATE|DELETE|DROP)/i", $query_text) ) { // ^ - делает проверку в только в начале строки (первое слово). i - не учитываем регистр. пробел + - допускаеться любое количество пробелов, * - отсудствие символов тоже пропустит
        // \t - табуляция, \n - перенос строки. [ \t\r\n] - массив с значениями с которыми мы работаем, или просто указываем \s - проверка всех трех символов
        $return_rows = false;
    }

    // $location = strpos($strtoupper_query_text, "CREATE");
    // if($location === false || $location > 0){
    //     $location = strpos($strtoupper_query_text, "INSERT");
    //     if($location === false || $location > 0){
    //        $location = strpos($strtoupper_query_text, "UPDATE"); 
    //        if($location === false || $location > 0){
    //            $location = strpos($strtoupper_query_text, "DELETE");
    //            if($location === false || $location > 0){
    //                $location = strpos($strtoupper_query_text, "DROP"); 
    //                if($location === false || $location > 0){
    //                //Если мы в этой ветке, то запрос не содержит команд CREATE, INSERT, UPDATE, DELETE, DROP
    //                    $return_rows = true;
    //                }
    //            }
    //        }
    //     }
    // }
    
    if($return_rows) {
        // у нас есть колонки что бы вывисти их по запросу
        echo "<p>Результаты вашего запроса:</p>";
        echo "<ul>";
    
        while($row = mysqli_fetch_row($result)) {
            echo "<li>".$row[0]."</li>";
        }
    
        echo "</ul>";
    } else {
        // Без колонок для вывода. Нужно сообщить что сработал запрос
        var_dump($query_text);
        echo "<p>Ваш запрос выполнен успешно</p>";
        echo "<p>".$query_text."</p>";
    }
    
?>
