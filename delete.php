<?php
require_once("db.php");
$db = new DataBase;
$db->deleteStudent("student", "id ='{$_GET['id']}'");
header('Location:list.php');
