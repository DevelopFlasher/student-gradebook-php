<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Электронный журнал</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<main class="container py-4">
    <table class="table">
        <tbody>
        <?php
        include_once '../mysqlConnect.php';

        $mysqli = connectDB();
        if ($mysqli->connect_error) {
            die('Не удалось подключиться к базе данных');
        }
        $mysqli->set_charset('utf8mb4');

        $user = null;
        if (!empty($_POST['password']) && !empty($_POST['login'])) {
            $stmt = $mysqli->prepare('SELECT * FROM users WHERE login = ? AND password = ?');
            $stmt->bind_param('ss', $_POST['login'], $_POST['password']);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
        }

        if (empty($user)) {
            echo '<tr><td>Неверный логин или пароль, либо пользователь не найден.</td></tr>';
            exit;
        }
        ?>

        <tr>
            <th scope="row">Предмет</th>
            <?php
            $subjects = $mysqli->query('SELECT Subject_name FROM Subjects');
            foreach ($subjects as $subject) {
                echo '<td>' . htmlspecialchars($subject['Subject_name']) . '</td>';
            }
            ?>
        </tr>
        <tr>
            <th scope="row">Оценка</th>
            <?php
            $userId = (int)$user['ID'];
            $stmt = $mysqli->prepare('SELECT mark FROM Marks WHERE ID_Student = ?');
            $stmt->bind_param('i', $userId);
            $stmt->execute();
            $marks = $stmt->get_result();
            while ($row = $marks->fetch_row()) {
                echo '<td>' . htmlspecialchars((string)$row[0]) . '</td>';
            }
            ?>
        </tr>
        <tr>
            <th scope="row">Преподаватель</th>
            <?php
            $teachers = $mysqli->query('SELECT name FROM Teachers');
            foreach ($teachers as $teacher) {
                echo '<td>' . htmlspecialchars($teacher['name']) . '</td>';
            }
            ?>
        </tr>
        </tbody>
    </table>
</main>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
