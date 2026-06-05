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

        $ID = $_GET['ID_Student'];

        $parts = $mysqli->query("SELECT * FROM Marks WHERE ID_Student='{$ID}'");
        $arr = (array)$parts;

        foreach ($parts as $row){
            echo "<pre>{$row['mark']}</pre>";
            echo "<pre>Оценка выведена</pre>";
        }
        break;

    case 'POST':
        $ID_Subject = $_GET['ID_Subject'];
        $ID_Student = $_GET['ID_Student'];
        $mark = $_GET['mark'];

        $parts = $mysqli->query("INSERT INTO Marks(ID_Subject, ID_Student, mark) VALUES('{$ID_Subject}','{$ID_Student}','{$mark}') ");
        echo "<pre>Оценка добавлена</pre>";
        break;

    case 'PUT':
        $ID = $_GET['ID_Subject'];
        $ID_Student = $_GET['ID_Student'];
        $new_mark = $_GET['mark'];

        $parts = $mysqli->query("UPDATE Marks SET mark = '{$new_mark}' WHERE ID_Subject='{$ID}' AND ID_Student='{$ID_Student}'");
        echo "<pre>Оценка обновлена</pre>";
        break;

    case 'DELETE':
        $ID = $_GET['ID_Subject'];
        $ID_Student = $_GET['ID_Student'];

        $parts = $mysqli->query("DELETE FROM Marks WHERE ID_Subject='{$ID}' AND ID_Student='{$ID_Student}'");
        echo "<pre>Оценка удалена</pre>";
        break;

}

