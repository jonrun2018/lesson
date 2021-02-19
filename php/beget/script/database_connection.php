<?php

    require 'app_config.php';

    $link = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME); // добавили имя базы

    if(!$link) {
        die("<p>Ошибка подключения к базе данных: ". mysqli_connect_error() ."</p>"); //выводим ошибку
    }

    echo "<p>Поздравляю, все работает!</p>";

    mysqli_select_db($link, DATABASE_NAME)
    or  die("<p>Ошибка при выборе базы данных ". DATABASE_NAME .": ". mysqli_connect_error() ."</p>"); //выводим ошибку

    echo '<p>Вы подключились к MySQL с использованием базы данных "' . DATABASE_NAME . '"</p>';

?>