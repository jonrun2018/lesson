<meta charset="UTF-8">

<?php 


    // mysql_connect("хост", "имя пользователя", "пароль"); - образец

    // подключение на php 5

    // mysql_connect("localhost", "u97897pq_php", "l*87B4xg")
    // or die("<p>Ошибка подключения к базе данных: ". mysql_error() ."</p>"); //выводим ошибку

    // echo "<p>Поздравляю, все работает!</p>";

    //подключение на php 7

    $link = mysqli_connect("localhost", "u97897pq_php", "l*87B4xg", "u97897pq_php"); // добавили имя базы

    if(!$link) {
        die("<p>Ошибка подключения к базе данных: ". mysqli_connect_error() ."</p>"); //выводим ошибку
    }

    echo "<p>Поздравляю, все работает!</p>";

    mysqli_select_db($link, 'u97897pq_php')
    or  die("<p>Ошибка при выборе базы данных: ". mysqli_connect_error() ."</p>"); //выводим ошибку

    echo "<p>Вы подключились к MySQL с использованием базы данных</p>";

    $result = mysqli_query($link, "SHOW TABLES");

    if($result === false) {
        die("<p>Ошибка при выводи перечня таблицы: ". mysqli_connect_error() ."</p>");
    }
    
    echo "<p>Таблицы, имеющиеся в базе данных:</p>";
    echo "<ul>";
    while($row = mysqli_fetch_row($result)) { // выводит строки бд по одной
        echo "<li>Таблица: {$row[0]} </li>";
    }
    echo "</ul>";

    var_dump($result);
?>

