<?php
require_once("db.php");
require_once("student.php");
$db = new DataBase;
$std = new Student();

if (isset($_REQUEST['login'])) {
    $data = $db->loginStudent("student", "email = '{$_REQUEST['email']}' AND pass = '{$_REQUEST['pass']}'");
    if (!$data) {
        header("Location:login.php?error=1");
    } else {
        setcookie("fname", $data['fname']);
        setcookie("lname", $data['lname']);
        header("Location:list.php");
    }
} else {
    $std->fname = $_REQUEST['fname'];
    $std->lname = $_REQUEST['lname'];
    $std->email = $_REQUEST['email'];
    $std->pass = $_REQUEST['pass'];
    $std->img = $_FILES['img'];
    $error = $std->getErrors();

    if (isset($_REQUEST['add'])) {
        if (count($error) == 0) {
            $db->insertData(
                "student", "fname='{$std->fname}', lname='{$std->lname}', email='{$std->email}', pass='{$std->pass}', img='{$std->img}'");
                setcookie("fname", $std->fname);
                setcookie("lname", $std->lname);
            header("Location:list.php");
        }else{
            $error = json_encode($error);
            header("Location:register.php?error=$error");
        }
    } elseif (isset($_REQUEST['update'])) {
        if (count($error) == 0) {
        $db->updateStudent(
            "student", "fname='{$std->fname}', lname='{$std->lname}', email='{$std->email}', pass='{$std->pass}', img='{$std->img}'",
            "id ='{$_REQUEST['id']}'" );
        header('Location:list.php');
        }else{
            $error = json_encode($error);
            header("Location:update.php?id={$_REQUEST['id']}&error={$error}");
        }
    }
}