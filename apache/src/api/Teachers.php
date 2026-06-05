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

    $ID = $_GET['ID_teacher_subject'];

    $parts = $mysqli->query("SELECT * FROM Teachers WHERE ID_teacher_subject='{$ID}'");
    $arr = (array)$parts;

    foreach ($parts as $row){
        echo "<pre>{$row['Name']}</pre>";
        echo "<pre>Учитель выведен</pre>";
    }
    break;

    case 'POST':
        $ID = $_GET['ID_teacher_subject'];
        $name = $_GET['Name'];

        $parts = $mysqli->query("INSERT INTO Teachers(ID_teacher_subject, Name) VALUES('{$ID}','{$name}') ");
        echo "<pre>Учитель добавлен</pre>";
        break;

    case 'PUT':
        $ID = $_GET['ID_teacher_subject'];
        $new_name = $_GET['Name'];

        $parts = $mysqli->query("UPDATE Teachers SET Name = '{$new_name}' WHERE ID_teacher_subject='{$ID}'");
        echo "<pre>Учитель обновлен</pre>";
        break;

    case 'DELETE':
        $ID = $_GET['ID_teacher_subject'];

        $parts = $mysqli->query("DELETE FROM Teachers WHERE ID_teacher_subject='{$ID}'");
        echo "<pre>Учитель удален</pre>";
        break;

}



