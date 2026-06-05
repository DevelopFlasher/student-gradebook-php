<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<table class="table">
    <tbody>

    <?php
    include_once '../mysqlConnect.php';
    $mysqli = connectDB();
    if ($mysqli->connect_error){
        die("Cant connect to db");
    mysqli_set_charset($con, "utf8");
    }
    ?>
    <?php
    if ( !empty($_REQUEST['password']) and !empty($_REQUEST['login']) ) {

        $login = $_REQUEST['login'];
        $password = $_REQUEST['password'];
    }
    $result = $mysqli->query('SELECT*FROM users WHERE login="'.$login.'" AND password="'.$password.'"');
    $user = mysqli_fetch_assoc($result);
    ?>

    <?php
    if (empty($user)) {

        echo 'Не правильный логин или пароль, либо нет пользователя';
        exit;
    }

?>
    <tr>
        <th scope='row'>Предмет</th>

    <?php
    $subject = $mysqli->query("SELECT Subject_name from Subjects");
    foreach ($subject as $subject){
        echo "<td>{$subject['Subject_name']}</td>";
    }
    ?>
</tr>
<tr>
    <th scope='row'>Оценка</th>

    <?php

    $ID=$user['ID'];
    $mark = $mysqli->query('SELECT mark from Marks where ID_Student="'.$ID.'"');
    while ($row = mysqli_fetch_row($mark)) {
        echo "<td>$row[0]</td>";
}
    ?>

</tr>
<tr>
    <th scope='row'>Преподаватель</th>

    <?php
    $Teacher = $mysqli->query("SELECT name from Teachers");
    foreach ($Teacher as $Teache){
        echo "<td>{$Teache['name']}</td>";
    }
    ?>
</tr>
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>