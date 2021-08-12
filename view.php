<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>List</title>
</head>
<body>
    <?php
    if (isset($_COOKIE['fname'])) {
        echo "Welcome " . $_COOKIE['fname'] . " " . $_COOKIE['lname'];
    } else {
        header("Location:login.php");
    }
    require_once("db.php");
    $db = new DataBase;
    $row = $db->getView("student","id ='{$_GET['id']}'");
    ?>
    <ul>
        <li><b>ID:</b> <?php echo $row['id']; ?></li>
        <li><b>FirstName:</b> <?php echo $row['fname']; ?></li>
        <li><b>LastName:</b> <?php echo $row['lname']; ?></li>
        <li><b>Email:</b> <?php echo $row['email']; ?></li>
        <li><b>Password:</b> <?php echo $row['pass']; ?></li>
        <br>        
        <li><b>Image:</b><?php echo "<img height='100' src='{$row['img']}'>" ; ?></li>
    </ul>
    <button onclick="document.location.href='list.php'">View List</button>

</body>

</html>