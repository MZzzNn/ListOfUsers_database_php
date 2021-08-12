<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>register</title>

    <style>
        table td {padding: 10px;}
        button {margin: 10px;}
        .error {color: red;}
    </style>
</head>

<body>
    <?php
    if (isset($_REQUEST['error'])) {
        $error = json_decode($_REQUEST['error']);
    }
    ?>

    <form action="studentController.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>First Name</td>
                <td>
                    <input type="text" name='fname'>
                    <span class='error'>
                        <?php if (isset($error->fname)) echo $error->fname; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>
                    <input type="text" name='lname'>
                    <span class='error'>
                        <?php if (isset($error->lname)) echo $error->lname; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="email">
                    <span class='error'>
                        <?php if (isset($error->email)) echo $error->email; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="pass">
                    <span class='error'>
                        <?php if (isset($error->password)) echo $error->password; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="file" name="img">
                    <span class='error'>
                        <?php if (isset($error->img)) echo $error->img; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value='Submit' name='add' class="btns">
                </td>
                <td>
                    <input type="reset" value="Reset" class="btns">
                </td>
            </tr>
        </table>
    </form>
    <button onclick="document.location.href='list.php'">View</button>
</body>

</html>