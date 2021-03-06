<?php
//Установка режима отладки
    define(DEBUG_MODE, true);

//корень хостинга
    define(HOST_WWW_ROOT, $_SERVER["DOCUMENT_ROOT"]);

//Константы подключения к базе данных

    define(DATABASE_HOST,"localhost");
    define(DATABASE_USERNAME,"u97897pq_php");
    define(DATABASE_PASSWORD,"l*87B4xg");
    define(DATABASE_NAME,"u97897pq_php");

    function debug_print($message) {
        if (DEBUG_MODE) {
            echo $message;
        }
    }

    function handle_error($user_error_message, $system_error_message) {
        header("Location: show_error.php?error_message={$user_error_message}&system_error_message={$system_error_message}");
        exit();
    }

    function get_web_path($file_system_path) {
        return str_replace(HOST_WWW_ROOT, '', $file_system_path);
    }

?>