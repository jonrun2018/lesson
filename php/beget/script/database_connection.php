<?php

    require_once 'app_config.php';

    $link = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME); // добавили имя базы

    if(!$link) {
        
        handle_error("Возникла проблема связаная с подключением к базе данных, содержащей нужную информацию", mysqli_connect_error());
        //die("<p>Ошибка подключения к базе данных: ". mysqli_connect_error() ."</p>"); //выводим ошибку
        //$user_error_message = "Возникла проблема связаная с подключением к базе данных, содержащей нужную информацию";
        //$system_error_message = mysqli_connect_error();

        //header("Location: show_error.php?error_message={$user_error_message}&system_error_message={$system_error_message}");
        //exit();
    }
    
    //вряд ли дойдем до сюда
    mysqli_select_db($link, DATABASE_NAME)
    or handle_error("Возникла проблема с конфигурацией базы данных", mysqli_connect_error());
        //or  die("<p>Ошибка при выборе базы данных ". DATABASE_NAME .": ". mysqli_connect_error() ."</p>"); //выводим ошибку
        //echo '<p>Вы подключились к MySQL с использованием базы данных "' . DATABASE_NAME . '"</p>';

    //if(mysqli_select_db($link, DATABASE_NAME)) {}
?>