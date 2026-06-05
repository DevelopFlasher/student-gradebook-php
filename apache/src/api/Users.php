<?php
$method = $_SERVER['REQUEST_METHOD'];
include_once '../mysqlConnect.php';
$mysqli = connectDB();
if ($mysqli->connect_error){
    die("Cant connect to db");
    mysqli_set_charset($con, "utf8");
}

switch ($method) {
    case 'GET':
        $ID = $_GET['ID'];

        $parts = $mysqli->query("SELECT * FROM users WHERE ID='{$ID}'");
        $arr = (array)$parts;

        foreach ($parts as $row){
            echo "<pre>{$row['name']}</pre>";
            echo "<pre>Пользователь выведен</pre>";
        }
        break;

    case 'POST':
        $ID = $_GET['ID'];
        $login = $_GET['login'];
        $name = $_GET['name'];
        $password = $_GET['password'];

        $parts = $mysqli->query("INSERT INTO users(ID, login, name, password) VALUES('{$ID}','{$login}','{$name}','{$password}') ");
        echo "<pre>Пользователь добавлен</pre>";
        break;

    case 'PUT':
        $ID = $_GET['ID'];
        $new_login = $_GET['login'];

        $parts = $mysqli->query("UPDATE users SET login = '{$new_login}' WHERE ID='{$ID}'");
        echo "<pre>Пользователь обновлен</pre>";
        break;

    case 'DELETE':
        $ID = $_GET['ID'];

        $parts = $mysqli->query("DELETE FROM users WHERE ID='{$ID}'");
        echo "<pre>Пользователь удален</pre>";
        break;
}


