<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>List</title>
    <?php
    require_once("db.php");
    $db = new DataBase;
    $data = $db->getAllData("student");
    ?>
    <style>
        table td, h2 { padding: 10px; }
        table, h2 { margin: auto;  text-align: center; }
        .c {color: brown;}
    </style>
    <script>
        function check(id) {
            var ans = confirm("Delete this student?");
            if (ans) {
                window.location.href = ('delete.php?id=' + id);
            }
        }
    </script>

</head>

<body>
    <?php
    if (isset($_COOKIE['fname'])) {
        echo "<h2 class='c'>" . "Welcome " . $_COOKIE['fname'] . " " . $_COOKIE['lname'] . "</h2>";
    } else {
        header("Location:login.php");
    } ?>
    <table border="2">
        <caption>
            <a href="register.php">
                <h2>Add new student</h2>
            </a>
            <a href="login.php">
                <h2>log out</h2>
            </a>

        </caption>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-mail</th>
            <th>Password</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            $colums = ['id', 'fname', 'lname', 'email', 'pass'];
            echo "<tr>";
            for ($i = 0; $i < count($colums); $i++) {
                echo "<td>" . $row[$colums[$i]] . "</td>";
            }
            echo "<td><img width=50 height=50 src='{$row['img']}'></td>";
            echo "<td>
            <a href='view.php?id={$row['id']}'>View</a>
            <a href='update.php?id={$row['id']}'>Edit</a>
            <a href='javascript: check({$row['id']})'>Delete</a>
            ";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>