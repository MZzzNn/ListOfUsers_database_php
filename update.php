<!DOCTYPE html>

<head>
    <meta charset="UTF-8">

    <style>
        table td {padding: 10px;}
        .error {color: red;}

    </style>
</head>

<body>

    <?php
    if (isset($_REQUEST['error'])) {
        $error = json_decode($_REQUEST['error']);
    }
    require_once("db.php");
    $db = new DataBase;
    $std = $db->getView("student", "id ='{$_GET['id']}'");
    ?>
    <form action="studentController.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>First Name</td>
                <td><input type="text" name='fname' value=<?php echo $std['fname'] ?>>
                <span class='error'>
                        <?php if (isset($error->fname)) echo $error->fname; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name='lname' value=<?php echo $std['lname'] ?>>
                <span class='error'>
                        <?php if (isset($error->lname)) echo $error->lname; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value=<?php echo $std['email'] ?>>
                <span class='error'>
                        <?php if (isset($error->email)) echo $error->email; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass" value=<?php echo $std['pass'] ?>>
                <span class='error'>
                        <?php if (isset($error->password)) echo $error->password; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="file" name="img" value="<?php echo $std['img'] ?>">
                    <span class='error'>
                        <?php if (isset($error->img)) echo $error->img; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value='Submit' name='update' class="btns">
                </td>
                <td>
                    <input type="hidden" name="id" value=<?php echo $std['id'] ?>>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>