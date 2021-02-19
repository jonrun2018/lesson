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
    
    $return_rows = false;
    $location = strpos($query_text, "CREATE");
    
    if($location === false){
        $location = strpos($query_text, "INSERT");
        if($location === false){
           $location = strpos($query_text, "UPDATE"); 
           if($location === false){
               $location = strpos($query_text, "DELETE");
               if($location === false){
                   $location = strpos($query_text, "DROP"); 
                   if($location === false){
                   //Если мы в этой ветке, то запрос не содержит команд CREATE, INSERT, UPDATE, DELETE, DROP
                       $return_rows = true;
                   }
               }
           }
        }
    }
    
    if($return_rows) {
        // у нас есть колонки что бы вывисти их по запросу
        echo "<p>Результаты вашего запроса:</p>";
        echo "<ul>";
    
        while($row = mysqli_fetch_row($result)) {
            echo "<li>".row[0]."</li>";
        }
    
        echo "</ul>";
    } else {
        // Без колонок для вывода. Нужно сообщить что сработал запрос
        var_dump($query_text);
        echo "<p>Ваш запрос выполнен успешно</p>";
        echo "<p>".$query_text."</p>";
    }
    
?>
