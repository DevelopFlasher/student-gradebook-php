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
        $ID = $_GET['Subject_ID'];

        $parts = $mysqli->query("SELECT * FROM Subjects WHERE Subject_ID='{$ID}'");
        $arr = (array)$parts;

        foreach ($parts as $row){
            echo "<pre>{$row['Subject_name']}</pre>";
            echo "<pre>Предмет выведен</pre>";
        }
        break;

    case 'POST':
        $ID = $_GET['Subject_ID'];
        $name = $_GET['Subject_name'];

        $parts = $mysqli->query("INSERT INTO Subjects(Subject_ID, Subject_name) VALUES('{$ID}','{$name}') ");
        echo "<pre>Предмет добавлен</pre>";
        break;

    case 'PUT':
        $ID = $_GET['Subject_ID'];
        $new_name = $_GET['Subject_name'];

        $parts = $mysqli->query("UPDATE Subjects SET Subject_name = '{$new_name}' WHERE Subject_ID='{$ID}'");
        echo "<pre>Предмет обновлен</pre>";
        break;

    case 'DELETE':
        $ID = $_GET['Subject_ID'];

        $parts = $mysqli->query("DELETE FROM Subjects WHERE Subject_ID='{$ID}'");
        echo "<pre>Предмет удален</pre>";
        break;
}


